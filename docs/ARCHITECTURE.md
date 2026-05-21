# Architecture

## Application Shape

TrackEd is a server-rendered Laravel application that uses Blade for UI composition and Vite for frontend bundling. Authentication is session-based. Functional access is enforced with a combination of base roles and PBAC middleware.

## Layers

- **Routes**: role-segmented entry points in `routes/web.php`
- **Controllers**: SSR orchestration per module namespace (`Teacher`, `Admin`, `Counselor`, `SchoolHead`)
- **Requests**: module-specific validation contracts in `app/Http/Requests`
- **Models**: Eloquent entities for users, permissions, DLLs, DSS, incidents, students, assets, and assignments
- **Services**: external AI boundary via `App\Services\Ai\DllPrecheckerClient`
- **Views**: Blade pages per module under `resources/views`
- **Offline Client**: `resources/js/dll-offline.js` and `public/sw.js`

## Security Boundaries

- Public self-registration is disabled
- Accounts are admin-provisioned
- Every authenticated route requires active-user middleware
- Role middleware scopes dashboard ecosystems
- PBAC middleware gates module access beyond role
