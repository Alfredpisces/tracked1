# Security

## Implemented Controls

- Disabled public self-registration
- Active-user middleware enforcement
- Role middleware by ecosystem
- PBAC middleware by module
- CSRF protection on SSR forms
- Session-based authentication

## Operational Guidance

- Rotate seeded credentials immediately outside local development
- Restrict AI prechecker access to trusted callers
- Review unresolved asset and incident data before certificate generation
- Prefer MySQL/PostgreSQL in shared environments over sqlite
