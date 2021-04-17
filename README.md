## Mello

Mello is a simple Trello-like web application written in Laravel. This example application should be deployable to the hosting solution that is designed and developed throughout the Project Hosting course (thaught at Thomas More in Geel).

![Mello Screenshot](docs/mello_screenshot.png)

## Version details

- PHP version 8.0.3
- MySQL version 8.0
- Laravel version 8.35.1

## Getting started

- Install Docker Desktop
- On Windows, install WSL2, as described [here](https://laravel.com/docs/8.x/installation#getting-started-on-windows)

The first time you're setting up this app, do the following:

```
# First time: install sail composer
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest composer install --ignore-platform-reqs

# Create a .env file from .env.example
cp .env.example .env

# Start sail
./vendor/bin/sail up

# Install npm packages
./vendor/bin/sail npm install

# Compile assets
./vendor/bin/sail npm run dev

# Compile assets and minify
./vendor/bin/sail npm run prod

# Run the database migrations
./vendor/bin/sail artisan migrate
```

The times after that, you can start the app by simply starting sail:

```
./vendor/bin/sail up
```

## Deployment

For the system requirements to run Laravel applications, check [this article](https://laravel.com/docs/8.x/deployment).

## Other resources

[Laravel's documentation](https://laravel.com/docs/8.x) is excellent.
