release: php artisan migrate --force
web: vendor/bin/heroku-php-apache2 public/
worker: php artisan queue:listen --tries=1 --timeout=3600