# 🚀 Deployment Guide — Hostinger Shared Hosting

Everything is built and ready locally. Follow these steps to go live.

---

## Step 1: Create Database on Hostinger

1. Login to **Hostinger hPanel**
2. Go to **Databases → MySQL Databases**
3. Create a new database (e.g. `alsbakh_db`)
4. Create a database user and assign it to the database
5. **Write down** the DB name, username, and password

## Step 2: Update `.env.production`

Open `.env.production` in the project root and fill in your Hostinger DB credentials:

```env
DB_DATABASE=your_hostinger_db_name
DB_USERNAME=your_hostinger_db_user
DB_PASSWORD=your_hostinger_db_password
```

## Step 3: Upload Files to Hostinger

Using **Hostinger File Manager** or **FTP** (FileZilla):

1. Upload **ALL project files** into `public_html/`
2. After upload, move the **contents** of `public_html/public/` into `public_html/` directly:
   - `public_html/public/index.php` → `public_html/index.php`
   - `public_html/public/.htaccess` → `public_html/.htaccess`
   - `public_html/public/build/` → `public_html/build/`
   - `public_html/public/favicon.ico` → `public_html/favicon.ico`
   - `public_html/public/robots.txt` → `public_html/robots.txt`
3. You can delete the now-empty `public_html/public/` folder

## Step 4: Fix `index.php` Paths

Edit `public_html/index.php` and change these lines:

```php
// CHANGE THIS:
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

// TO THIS:
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
```

Also update the maintenance mode path:
```php
// CHANGE THIS:
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {

// TO THIS:
if (file_exists($maintenance = __DIR__.'/storage/framework/maintenance.php')) {
```

## Step 5: Set Up `.env` on Server

1. Rename `.env.production` → `.env` on the server  
   (or copy the contents into the `.env` file on the server)
2. Make sure `.env` has the correct DB credentials from Step 1

## Step 6: Import Database

1. Open **phpMyAdmin** from Hostinger hPanel
2. Select your database
3. Click **Import**
4. Upload `alsbakh_database.sql`
5. Click **Go**

## Step 7: Set Permissions

If SSH is available:
```bash
ssh your-user@your-server.hostinger.com
cd public_html
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
```

If SSH is **not** available:
- Use File Manager to set `storage/` and `bootstrap/cache/` folders to **755**

## Step 8: Test Everything

Visit these URLs and confirm they work:

| Page | URL |
|------|-----|
| Homepage | https://bmatchdesgin.com |
| Products | https://bmatchdesgin.com/products |
| Contact | https://bmatchdesgin.com/contact |
| Admin Login | https://bmatchdesgin.com/admin/login |

**Admin credentials:** `admin@alsbakh.com` / `alsbakh2024`

---

## Troubleshooting

| Issue | Fix |
|-------|-----|
| 500 Error | Temporarily set `APP_DEBUG=true` in `.env`, check error, then set back to `false` |
| Blank page | Check **Logs** in Hostinger hPanel for PHP errors |
| DB connection failed | Double-check DB credentials in `.env` |
| CSS not loading | Make sure `build/` folder was moved to `public_html/` root |
| Routes not working | Verify `.htaccess` exists in `public_html/` |
| Session/cache errors | Run `php artisan migrate` via SSH or import any missing tables |

---

## Files Created for Deployment

| File | Purpose |
|------|---------|
| `.env.production` | Production environment config (fill in DB creds) |
| `alsbakh_database.sql` | Full database export for import via phpMyAdmin |
| `DEPLOY.md` | This guide |
