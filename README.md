# kprsnt.in — Laravel Version

Portfolio website built with **PHP + Laravel**, featuring the same design and functionality as the Astro version.

## Tech Stack
- **Backend**: PHP 8.1+, Laravel 11
- **Templates**: Blade
- **Styling**: Bootstrap Darkly + custom CSS (glassmorphism)
- **AI**: Gemini API (for AI Insight feature)

## Local Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve    # http://localhost:8000
```

## Deploy to Vercel

> **Note**: Vercel doesn't natively support PHP. Use one of these options:

### Option A: Deploy via Docker (Recommended)

1. Create a `Dockerfile`:
```dockerfile
FROM php:8.2-apache
COPY . /var/www/html/
RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite
RUN composer install --no-dev --optimize-autoloader
```

2. Deploy to **Railway**, **Render**, or **DigitalOcean App Platform** instead.

### Option B: Deploy to Vercel with vercel-php

1. Install the community PHP runtime:
```json
{
  "version": 2,
  "builds": [
    { "src": "public/index.php", "use": "vercel-community/php@0.7.1" }
  ],
  "routes": [
    { "src": "/(.*)", "dest": "public/index.php" }
  ]
}
```

2. Set environment variables in Vercel:
   - `APP_KEY` — run `php artisan key:generate --show` to get this
   - `APP_ENV` = `production`
   - `GEMINI_API_KEY` — your Gemini API key

3. Push and deploy:
```bash
git push origin main
```

### Option C: Traditional PHP Hosting

Works on any PHP hosting (cPanel, Hostinger, etc.):
1. Upload files
2. Point document root to `public/`
3. Run `composer install`
4. Set `.env` values

## Environment Variables

| Variable | Description |
|---|---|
| `APP_KEY` | Laravel encryption key |
| `GEMINI_API_KEY` | Google Gemini API key for AI Insight |

## Pages
- `/` — About Me (home)
- `/skills` — Technical Skills
- `/projects` — Project Portfolio
- `/resume` — Resume / CV
- `/blog` — Blog listing
- `/blog/{slug}` — Blog post
- `/plotter` — Interactive Data Plotter
