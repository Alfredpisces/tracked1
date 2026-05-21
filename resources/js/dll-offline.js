const DB_NAME = 'tracked1-offline';
const DB_VERSION = 1;

async function openDb() {
    return await new Promise((resolve, reject) => {
        const request = indexedDB.open(DB_NAME, DB_VERSION);
        request.onupgradeneeded = () => {
            const db = request.result;
            if (!db.objectStoreNames.contains('drafts')) {
                db.createObjectStore('drafts');
            }
            if (!db.objectStoreNames.contains('syncQueue')) {
                db.createObjectStore('syncQueue', { keyPath: 'id', autoIncrement: true });
            }
        };
        request.onsuccess = () => resolve(request.result);
        request.onerror = () => reject(request.error);
    });
}

async function withStore(storeName, mode, callback) {
    const db = await openDb();
    return await new Promise((resolve, reject) => {
        const tx = db.transaction(storeName, mode);
        const store = tx.objectStore(storeName);
        const result = callback(store);
        tx.oncomplete = () => resolve(result?.result ?? result);
        tx.onerror = () => reject(tx.error);
    });
}

async function getDraft(key) {
    return await withStore('drafts', 'readonly', (store) => store.get(key));
}

async function saveDraft(key, value) {
    return await withStore('drafts', 'readwrite', (store) => store.put(value, key));
}

async function deleteDraft(key) {
    return await withStore('drafts', 'readwrite', (store) => store.delete(key));
}

async function queuePayload(payload) {
    return await withStore('syncQueue', 'readwrite', (store) => store.add(payload));
}

async function getQueuedPayloads() {
    const db = await openDb();
    return await new Promise((resolve, reject) => {
        const tx = db.transaction('syncQueue', 'readonly');
        const request = tx.objectStore('syncQueue').getAll();
        request.onsuccess = () => resolve(request.result || []);
        request.onerror = () => reject(request.error);
    });
}

async function deleteQueuedPayload(id) {
    return await withStore('syncQueue', 'readwrite', (store) => store.delete(id));
}

async function flushQueue(statusNode) {
    if (!navigator.onLine) {
        return;
    }

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    const queued = await getQueuedPayloads();

    for (const item of queued) {
        const body = new URLSearchParams(item.fields);
        const response = await fetch(item.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken || '',
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
            },
            body,
        });

        if (response.ok) {
            await deleteQueuedPayload(item.id);
            if (item.draftKey) {
                await deleteDraft(item.draftKey);
                localStorage.removeItem(item.draftKey);
            }
            if (statusNode) {
                statusNode.innerText = 'Queued DLL synced successfully.';
            }
        } else if (response.status === 409 && statusNode) {
            statusNode.innerText = 'Sync conflict detected. Refresh the page before retrying.';
        }
    }
}

document.addEventListener('DOMContentLoaded', async () => {
    const form = document.getElementById('dll-form');
    if (!form) {
        return;
    }

    const draftKey = form.dataset.draftKey;
    const statusNode = document.getElementById('save-status');
    const networkStatus = document.getElementById('network-status');
    const precheckRoute = form.dataset.precheckRoute;
    const precheckButton = document.getElementById('ai-precheck-btn');
    const aiResult = document.getElementById('ai-precheck-result');
    const clearDraftKey = form.dataset.clearDraftKey;

    if (clearDraftKey) {
        await deleteDraft(clearDraftKey);
        localStorage.removeItem(clearDraftKey);
    }

    const updateNetworkState = () => {
        networkStatus?.classList.toggle('hidden', navigator.onLine);
    };
    updateNetworkState();
    window.addEventListener('online', async () => {
        updateNetworkState();
        await flushQueue(statusNode);
    });
    window.addEventListener('offline', updateNetworkState);

    const cachedDraft = (await getDraft(draftKey)) || JSON.parse(localStorage.getItem(draftKey) || 'null');
    if (cachedDraft) {
        Object.entries(cachedDraft).forEach(([key, value]) => {
            if (form.elements[key] && !['action', '_token', '_method'].includes(key)) {
                form.elements[key].value = value;
            }
        });
        if (statusNode) statusNode.innerText = 'Draft restored from offline storage.';
    }

    const persistDraft = async () => {
        const draftData = {};
        new FormData(form).forEach((value, key) => {
            if (!['_token', '_method', 'action'].includes(key)) {
                draftData[key] = value;
            }
        });
        await saveDraft(draftKey, draftData);
        localStorage.setItem(draftKey, JSON.stringify(draftData));
        if (statusNode) statusNode.innerText = `Draft saved locally at ${new Date().toLocaleTimeString()}`;
    };

    form.addEventListener('input', persistDraft);

    form.addEventListener('submit', async (event) => {
        if (navigator.onLine) {
            return;
        }

        event.preventDefault();
        const fields = {};
        new FormData(form).forEach((value, key) => {
            fields[key] = value;
        });
        fields.action = document.activeElement?.value || fields.action || 'draft';
        await queuePayload({
            action: form.action,
            fields,
            draftKey,
        });
        if (statusNode) statusNode.innerText = 'Offline: DLL queued for sync.';
    });

    precheckButton?.addEventListener('click', async () => {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        const body = new URLSearchParams();
        new FormData(form).forEach((value, key) => {
            if (key !== '_method') {
                body.append(key, value);
            }
        });

        const response = await fetch(precheckRoute, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken || '',
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
            },
            body,
        });

        const result = await response.json();
        const feedback = Array.isArray(result.feedback) ? result.feedback.join(' ') : 'No feedback returned.';
        aiResult.innerText = `${result.passed ? 'Passed' : 'Needs work'} (${Math.round((result.score || 0) * 100)}%): ${feedback}`;
    });

    await flushQueue(statusNode);
});
