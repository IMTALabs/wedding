# Wedding Invitation

## Prerequisites

- Docker

## Build

```bash
docker compose up --build -d
```

## Run

```bash
docker exec -it laravel_app bash
```

In the container, run:

```bash
composer install

php artisan key:generate

php artisan migrate
```

If this error occurs:

> file_put_contents(/var/www/html/storage/framework/views/xxxxxxxxxxxxx.php): Failed to open stream: Permission denied

Run this command inside the container:

```bash
chown -R $USER:www-data storage && chown -R $USER:www-data bootstrap/cache && chmod -R 775 storage && chmod -R 775 bootstrap/cache
```

## Access the application

Open your browser and go to:

```
http://localhost:8088
```
