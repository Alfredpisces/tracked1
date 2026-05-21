# API and Contract Strategy

## Source of Truth

TrackEd uses Laravel FormRequest classes as runtime request contracts and documents external/API boundaries in `docs/openapi.yaml`.

## Current Contracts

- DLL save/update/precheck requests
- Incident submission requests
- Professional growth submission requests
- Personnel provisioning requests
- Good moral certificate generation requests

## AI Boundary

The Laravel app can call an external Python NLP prechecker using:

- `AI_PRECHECKER_URL`
- `AI_PRECHECKER_TOKEN`
- `AI_PRECHECKER_TIMEOUT`

If the remote service is unavailable, the app falls back to a local completeness heuristic so DLL submission remains usable.
