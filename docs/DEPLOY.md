# Deployment

## Recommended Production Shape

- PHP application server for Laravel
- MySQL or PostgreSQL database
- Queue worker for background jobs
- Shared storage for uploaded evidence files
- HTTPS termination in front of Laravel

## Deployment Checklist

1. Set production environment variables
2. Run `composer install --no-dev --optimize-autoloader`
3. Run `npm ci && npm run build`
4. Run `php artisan migrate --force --seed`
5. Run queue worker for database queues
6. Verify service worker and asset manifest are served correctly
