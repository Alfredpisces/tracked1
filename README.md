# TrackEd

TrackEd is a Laravel + Blade + Vite school operations platform for DLL drafting, PBAC-controlled personnel access, DSS analytics, student incident tracking, counselor interventions, certificate gating, and inventory accountability.

## Core Modules

- Teacher DLL drafting with offline-safe client persistence
- Admin personnel provisioning and PBAC assignment
- DSS / COT / professional growth tracking
- Student incident reporting and counselor intervention workflows
- Inventory assignment, accountability, and clearance blocking

## Quick Start

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install
npm run build
php artisan serve
```

## Development Commands

```bash
composer test
./vendor/bin/pint --test
npm run build
composer dev
```

## Documentation

- [Architecture](docs/ARCHITECTURE.md)
- [API](docs/API.md)
- [OpenAPI Contract](docs/openapi.yaml)
- [Database Schema](docs/DB_SCHEMA.md)
- [Environment](docs/ENV.md)
- [Deployment](docs/DEPLOY.md)
- [Offline DLL Design](docs/OFFLINE_DLL.md)
- [AI Prechecker Boundary](docs/AI_PRECHECKER.md)
- [Security](docs/SECURITY.md)
- [Runbook](docs/RUNBOOK.md)
