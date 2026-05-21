# AI Prechecker Boundary

## Recommended Python Service Shape

- Dedicated internal HTTP service
- Authenticated with bearer token
- Returns normalized JSON payloads for DLL completeness and quality feedback

## Laravel Integration

`App\Services\Ai\DllPrecheckerClient` attempts a remote HTTP call first and falls back to a local heuristic if the Python service is unavailable.

## Security Requirements

- Keep the AI service private/internal
- Validate and sanitize all prompt payloads
- Avoid sending unnecessary PII
- Apply request timeouts and safe fallbacks
