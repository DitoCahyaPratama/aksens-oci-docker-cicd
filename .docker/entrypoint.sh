dockerize -template ./.docker/env/.env:.env
composer install
php artisan key:generate
php artisan migrate
php-fpm
