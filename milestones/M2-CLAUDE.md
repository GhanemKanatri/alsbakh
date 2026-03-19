# CLAUDE.md — Milestone 2: Admin Dashboard

## Context
This is Milestone 2 of the alsbakh project.
M1 is complete: Laravel is running, products table exists, all public pages work.
Now build the admin dashboard for managing products.

## What Already Exists
- Laravel 11 project running at localhost:8000
- `products` table: id, name, description, image_url, brand, origin, slug, is_featured
- All public routes: /, /products, /products/{slug}, /contact
- `layouts/app.blade.php` for public pages
- TailwindCSS + Alpine.js configured

## What You Are Building
A protected admin dashboard at /admin with:
- Login page (/admin/login)
- Products table with all CRUD operations
- Separate admin layout (sidebar + topbar)

## Admin Credentials (seed these)
- Email: admin@alsbakh.com
- Password: alsbakh2024

## Routes to Create
```
GET  /admin/login          → show login form
POST /admin/login          → authenticate
POST /admin/logout         → logout
GET  /admin/products       → list all products (protected)
GET  /admin/products/create → show create form (protected)
POST /admin/products       → store new product (protected)
GET  /admin/products/{id}/edit → show edit form (protected)
PUT  /admin/products/{id}  → update product (protected)
DELETE /admin/products/{id} → delete product (protected)
```

## Your Task — Execute in This Order
1. Create Admin\AuthController (showLogin, login, logout methods)
2. Create Admin\ProductController (index, create, store, edit, update, destroy)
3. Add all routes to web.php with auth middleware
4. Create admin user seeder and run it
5. Create `layouts/admin.blade.php` (sidebar + topbar)
6. Create `admin/login.blade.php`
7. Create `admin/products/index.blade.php` (table + delete confirmation)
8. Create `admin/products/create.blade.php` (form + image preview + slug auto-gen)
9. Create `admin/products/edit.blade.php` (pre-filled form + delete button)
10. Test all CRUD operations

## Key Implementation Details
- Auth: Use Laravel session auth (NOT JWT — simpler for Blade)
- Middleware: Use `middleware('auth')` on admin route group
- After login: redirect to /admin/products
- After logout: redirect to /admin/login
- Slug: auto-generate from name using Alpine.js in create form
- Image preview: show live preview when URL is typed
- Delete: use form with @method('DELETE') + JavaScript confirm()
- Validation: name required, image_url required + valid URL, slug unique

## Strict Rules
- NO file upload — only image_url text input
- Admin layout is COMPLETELY separate from public layout
- All admin routes must redirect to login if not authenticated
- English only
- Use same brand colors: sidebar #0B2C5E, buttons #D4A017

## Definition of Done
- /admin/login works and blocks wrong credentials
- /admin/products shows all products in a table
- Can add a new product and it appears on the public website immediately
- Can edit a product and changes reflect on public website
- Can delete a product (with confirmation)
- Refreshing any /admin/* page redirects to login if not logged in
