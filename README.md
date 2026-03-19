# alsbakh — Premium Plumbing Products

A full-stack plumbing e-commerce website built with Laravel, featuring a public product catalog and a protected admin dashboard for managing products.

---

## Live Demo

> Coming soon — deploying to Hostinger

---

## Screenshots

### Public Website
![Home Page](https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1200&q=80)

---

## Features

### Public Website
- Clean, responsive product catalog
- Individual product detail pages
- WhatsApp & Email direct contact
- Mobile-friendly design
- Smooth animations with Alpine.js

### Admin Dashboard
- Secure login system (JWT session-based auth)
- Full product management (Create / Read / Update / Delete)
- Live image preview when adding products
- Auto-generated URL slugs
- Featured product toggle

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel 11 (PHP) |
| Frontend | Blade Templates |
| Styling | TailwindCSS |
| Interactivity | Alpine.js |
| Database | MySQL |
| Build Tool | Vite |
| Deployment | Hostinger Shared Hosting |

---

## Project Structure

```
alsbakh/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   ├── ProductController.php
│   │   └── Admin/
│   │       ├── AuthController.php
│   │       └── ProductController.php
│   └── Models/
│       └── Product.php
├── resources/views/
│   ├── layouts/
│   │   ├── app.blade.php
│   │   └── admin.blade.php
│   ├── home.blade.php
│   ├── contact.blade.php
│   ├── products/
│   │   ├── index.blade.php
│   │   └── show.blade.php
│   └── admin/
│       ├── login.blade.php
│       └── products/
│           ├── index.blade.php
│           ├── create.blade.php
│           └── edit.blade.php
├── routes/web.php
└── database/migrations/
```

---

## Pages

| Route | Description |
|---|---|
| `/` | Homepage — Hero, Stats, Featured Products |
| `/products` | All products grid |
| `/products/{slug}` | Product detail page |
| `/contact` | WhatsApp & Email contact |
| `/admin/login` | Admin login |
| `/admin/products` | Manage all products |

---

## Database Schema

```sql
products:
  id              BIGINT PRIMARY KEY
  name            VARCHAR(255)
  description     TEXT
  image_url       VARCHAR(500)
  brand           VARCHAR(100)
  origin          VARCHAR(100)
  slug            VARCHAR(255) UNIQUE
  is_featured     BOOLEAN
  created_at      TIMESTAMP
  updated_at      TIMESTAMP
```

---

## Getting Started

### Prerequisites

- PHP 8.2+
- Composer
- Node.js 18+
- MySQL

### Installation

```bash
# Clone the repository
git clone https://github.com/your-username/alsbakh.git
cd alsbakh

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Configure your database in .env
DB_DATABASE=alsbakh
DB_USERNAME=root
DB_PASSWORD=

# Run migrations
php artisan migrate

# Seed the database
php artisan db:seed

# Build assets
npm run build

# Start the server
php artisan serve
```

### Admin Access

```
URL:      http://localhost:8000/admin/login
Email:    admin@alsbakh.com
Password: alsbakh2024
```

---

## Brand

| Color | HEX | Usage |
|---|---|---|
| Dark Blue | `#0B2C5E` | Primary |
| Light Blue | `#1E6FBF` | Hover states |
| Gold | `#D4A017` | CTA Buttons |

Font: **Inter** (Google Fonts)

---

## Roadmap

- [x] Public product catalog
- [x] Product detail pages
- [x] Admin dashboard (CRUD)
- [x] Mobile responsive design
- [ ] Deploy to Hostinger
- [ ] Image upload via Cloudinary
- [ ] Product categories & filtering
- [ ] Search functionality

---

## Author

Built by **Ghanem Kanatri** — Freelance Full Stack Developer

- GitHub: [@ghanemkanatri](https://github.com/ghanemkanatri)
- Instagram: [@GhanemKanatri]

---

## License

This project is open source and available under the [MIT License](LICENSE).
