# CLAUDE.md — Milestone 1: Laravel Setup + Full Frontend

## What You Are Building
A professional plumbing products website called "alsbakh".
This is Milestone 1: complete Laravel setup + all public-facing pages.

## Tech Stack
- Laravel 11 (PHP)
- Blade Templates
- TailwindCSS (npm)
- Alpine.js (CDN)
- MySQL (local)

## Brand
- Primary: #0B2C5E | Accent: #D4A017 | Hover: #1E6FBF
- Font: Inter (Google Fonts)
- Language: English only, LTR

## Database — One Table Only
```sql
products: id, name, description, image_url, brand, origin, slug, is_featured, created_at, updated_at
```

## Pages to Build
1. `/` → Hero + Stats Bar + Featured Products
2. `/products` → Simple grid, all products
3. `/products/{slug}` → Product detail page
4. `/contact` → WhatsApp + Email + map

## Seed Data
Insert exactly 3 products (see M1.md for full data).
`is_featured = true` for first 2 products.

## Your Task — Execute in This Order
1. Create Laravel project named `alsbakh`
2. Configure `.env` for MySQL
3. Create and run products migration
4. Create Product model
5. Create seeder with 3 products and run it
6. Install and configure TailwindCSS
7. Create `layouts/app.blade.php` with navbar + footer + WhatsApp float
8. Create HomeController + route → home.blade.php
9. Create ProductController + routes → index + show views
10. Create contact route → contact.blade.php
11. Make everything mobile responsive

## Strict Rules
- NO Arabic text anywhere
- NO custom CSS files — Tailwind utilities only
- NO /blog, /careers, /distributors routes
- NO file upload — only image_url text field
- Every page must work on mobile (responsive)
- All CTA buttons use gold color (#D4A017)
- Navbar must be sticky with backdrop-blur

## Definition of Done
All 4 pages load without errors.
Products display from the database.
Design matches brand colors.
Mobile responsive.
Run `php artisan serve` and confirm everything works.
