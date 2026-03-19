# CLAUDE.md — Milestone 3: Deploy to Hostinger

## Context
This is Milestone 3 of the alsbakh project — the final step.
M1 + M2 are 100% complete and working locally.
Now deploy everything to Hostinger Shared Hosting.

## What Already Exists
- Complete Laravel 11 project (frontend + admin dashboard)
- All public pages working: /, /products, /products/{slug}, /contact
- Admin dashboard working: /admin/login, /admin/products (full CRUD)
- Local MySQL database with products table + admin user

## Target
- Live URL: https://bmatchdesgin.com
- Admin: https://bmatchdesgin.com/admin/login
- Hosting: Hostinger Shared Hosting (PHP + MySQL)

## Hostinger Details (user must fill these in)
```
DB_HOST=localhost
DB_DATABASE=_______________
DB_USERNAME=_______________
DB_PASSWORD=_______________
SSH: enabled/disabled?
```

## Your Task — Execute in This Order
1. Run `composer install --optimize-autoloader --no-dev`
2. Run `npm run build`
3. Run `php artisan config:cache && php artisan route:cache && php artisan view:cache`
4. Update .env for production (APP_ENV=production, APP_DEBUG=false, correct DB credentials)
5. Export local database as SQL file (or prepare migration commands)
6. Upload all files to Hostinger public_html via FTP or File Manager
7. Fix index.php paths for Hostinger structure (see M3.md for exact changes)
8. Import database via phpMyAdmin OR run migrations via SSH
9. Set storage/ and bootstrap/cache/ permissions to 755
10. Test all routes on live URL

## Critical File to Edit After Upload
`public_html/index.php` — change these two lines:
```php
// FROM:
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

// TO:
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
```

## Definition of Done
- bmatchdesgin.com loads without errors
- All public pages work
- Admin login works with: admin@alsbakh.com / alsbakh2024
- Admin can add a product and it appears on the public site
- APP_DEBUG=false in production .env
