#!/bin/sh

echo "🎬 entrypoint.sh: [$(whoami)] [PHP $(php -r 'echo phpversion();')]"

composer dump-autoload --no-interaction --no-dev --optimize

# Create required directories if not exists
# Need loop for /bin/sh compatibility
for dir in "$LARAVEL_PATH/storage/framework/sessions" "$LARAVEL_PATH/storage/framework/views" "$LARAVEL_PATH/storage/framework/cache"; do
    [ -d "$dir" ] || mkdir -p "$dir"
done
chmod -R 755 "$LARAVEL_PATH/storage/framework"

echo "🎬 artisan commands"

# 💡 Group into a custom command e.g. php artisan app:on-deploy
php artisan db:seed --class=ProductionSeeder --force
php artisan storage:link
php artisan filament:assets
php artisan migrate --no-interaction --force
php artisan optimize

echo "🎬 start supervisord"

supervisord -c $LARAVEL_PATH/.deploy/config/supervisor.conf
