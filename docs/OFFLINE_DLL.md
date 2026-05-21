# Offline DLL Design

## Current Implementation

- Service worker caches app shell responses
- DLL drafts persist in IndexedDB with localStorage fallback
- Offline submissions are queued locally and retried when connectivity returns
- Conflict detection uses `last_known_server_updated_at`

## Conflict Policy

- Create operations: queue and replay when online
- Update operations: reject with conflict if server `updated_at` changed since the client snapshot
- Teacher refreshes, reviews the latest server state, and retries intentionally
