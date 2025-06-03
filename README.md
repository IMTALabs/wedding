# Wedding Invitation

## Prerequisites

- Docker

## Build and Start the Application

To build the Docker images and start the application containers in detached mode, run:

```bash
docker compose up --build -d
```

## Initial Setup

After the containers are running, you need to perform some initial setup steps inside the application container.

1.  Access the application container's shell:

    ```bash
    docker exec -it laravel_app bash
    ```

2.  Inside the container, run the following commands:

    ```bash
    # Install PHP dependencies
    composer install

    # Generate the application key
    php artisan key:generate

    # Run database migrations
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

## Notice

After running the container, you can access the container and using all `artisan` or `npm` commands inside the container.

```bash
docker exec -it laravel_app bash
```
