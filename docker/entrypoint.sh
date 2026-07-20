#!/bin/sh
set -e
cd /app

# --- Environment file (production values come from platform env vars) ---
if [ ! -f .env ]; then
    cp .env.example .env
    sed -i 's/^APP_ENV=.*/APP_ENV=production/' .env
    sed -i 's/^APP_DEBUG=.*/APP_DEBUG=false/' .env
fi

# --- Application key ---
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

# --- Public URL (so assets/images load on the deployed domain) ---
if [ -n "$RENDER_EXTERNAL_URL" ]; then
    APP_URL="$RENDER_EXTERNAL_URL"
elif [ -n "$RAILWAY_PUBLIC_DOMAIN" ]; then
    APP_URL="https://$RAILWAY_PUBLIC_DOMAIN"
fi
if [ -n "$APP_URL" ]; then
    if grep -q '^APP_URL=' .env; then
        sed -i "s#^APP_URL=.*#APP_URL=${APP_URL}#" .env
    else
        echo "APP_URL=${APP_URL}" >> .env
    fi
fi

# --- SQLite database ---
mkdir -p database
[ -f database/database.sqlite ] || touch database/database.sqlite

# --- Fresh, seeded demo content on every boot (read-only showcase) ---
php artisan migrate:fresh --seed --force

# --- Public storage symlink for uploaded/seeded images ---
php artisan storage:link || true

# --- Optimize ---
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# --- Serve ---
exec php artisan serve --host=0.0.0.0 --port="${PORT:-8080}"
