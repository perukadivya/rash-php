# kprsnt.in — Laravel Version

Portfolio website built with **PHP + Laravel**.

## Tech Stack
- **Backend**: PHP 8.1+, Laravel 11
- **Templates**: Blade
- **Styling**: Bootstrap Darkly + custom CSS (glassmorphism)
- **AI**: Gemini API via Guzzle HTTP

## Local Setup
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve    # http://localhost:8000
```

## Deploy to Cloudflare

> **Important**: Cloudflare Pages doesn't run PHP natively. Use **Cloudflare + Docker** via a VPS or one of these alternatives:

### Option A: Cloudflare Tunnel + VPS (Recommended)

Run Laravel on a VPS and expose it via Cloudflare Tunnel for CDN/security:

```bash
# On your VPS
composer install --no-dev --optimize-autoloader
cp .env.example .env
php artisan key:generate

# Install cloudflared
curl -L https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-amd64 -o /usr/local/bin/cloudflared
chmod +x /usr/local/bin/cloudflared

# Create tunnel
cloudflared tunnel login
cloudflared tunnel create laravel-portfolio
cloudflared tunnel route dns laravel-portfolio your-domain.com

# Run
php artisan serve --host=0.0.0.0 --port=8000 &
cloudflared tunnel run --url http://localhost:8000 laravel-portfolio
```

### Option B: Railway (Easiest)

1. Go to [railway.app](https://railway.app) → New Project → Deploy from GitHub
2. Select `rash-php` repo
3. Railway auto-detects PHP and runs `composer install`
4. Set environment variables: `APP_KEY`, `GEMINI_API_KEY`
5. Add a custom domain via Cloudflare DNS

### Option C: Docker on any VPS

```dockerfile
FROM php:8.2-apache
COPY . /var/www/html/
RUN apt-get update && apt-get install -y zip unzip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader
RUN cp .env.example .env && php artisan key:generate
RUN a2enmod rewrite
```

Then point Cloudflare DNS to your VPS IP.

## Environment Variables

| Variable | Description |
|---|---|
| `APP_KEY` | Laravel encryption key (`php artisan key:generate`) |
| `GEMINI_API_KEY` | Google Gemini API key |

## Pages
- `/` — About Me
- `/skills` — Technical Skills
- `/projects` — Project Portfolio
- `/resume` — Resume
- `/blog` — Blog listing
- `/blog/{slug}` — Blog post
- `/plotter` — Data Plotter
