## Mello

Mello is a simple Trello-like web application written in Laravel. This example application should be deployable to the hosting solution that is designed and developed throughout the Project Hosting course (taught at Thomas More in Geel).

![Mello Screenshot](docs/mello_screenshot.png)

## Version details

- PHP version 8.0.3
- MySQL version 8.0
- Laravel version 8.35.1

## Getting started (local development)

- On Linux, install [Docker](https://www.docker.com/), [ensure you can run docker as a non-root user](https://docs.docker.com/engine/install/linux-postinstall/#manage-docker-as-a-non-root-user), and [install docker-compose](https://docs.docker.com/compose/install/).
- On Mac or Windows, install [Docker Desktop](https://www.docker.com/products/docker-desktop)
- On Windows, install WSL2 as described [here](https://laravel.com/docs/8.x/installation#getting-started-on-windows)

The first time you're setting up this app, clone this repository and execute the following in a (WSL2) terminal:

```
# First time: install dependencies (including sail)
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest composer install --ignore-platform-reqs

# Create a .env file from .env.example
cp .env.example .env

# Start sail (detached)
./vendor/bin/sail up -d

# Add an app key to .env
./vendor/bin/sail artisan key:generate

# Install npm packages
./vendor/bin/sail npm install

# Compile assets for dev (through mix)
./vendor/bin/sail npm run dev

# Compile assets and minify for prod (through mix)
./vendor/bin/sail npm run prod

# Run the database migrations
./vendor/bin/sail artisan migrate
```

The times after that, you can start the app for local development by simply starting sail:

```
./vendor/bin/sail up -d
```

### Troubleshooting

If the migrations fail because the database user supposedly does not have access to the database, try the following:

```
# Stop all containers, also removing the volumes
./vendor/bin/sail down -v

# Spin up all containers again
./vendor/bin/sail up -d

# Rerun the migrations
./vendor/bin/sail artisan migrate
```

## Deployment

The instructions above are for running the app **locally** - on your own computer - using Laravel Sail to manage the Docker containers.
When you want to deploy this app to a self-managed server and make it available through a web server, you should not use Laravel Sail. Laravel Sail is not built for serving PHP applications in production.

- For the system requirements to run Laravel applications on a server, check [this article](https://laravel.com/docs/8.x/deployment).
- For a step-by-step guide on how to actually run the application code on the server, check [this article](https://laraveldaily.com/how-to-deploy-laravel-projects-to-live-server-the-ultimate-guide/). Important notes:
    + The article is from October 2018, so things may have slightly changed.
    + The article uses an NGINX web server. You can also use an Apache web server.
    + The article suggests to `git clone` the repository onto your web server, so you're not putting files that are ignored through `.gitignore` on the web server (installed PHP and NPM packages, sensitive environment files, etc.). However, you don't _have_ to use this approach. You can also use `scp` or `ftp`, but make sure you only put necessary files on the server.
    + Make sure that the server contains compiled JS and CSS assets.

## Other resources

- [Laravel's documentation](https://laravel.com/docs/8.x) is excellent.
- [Laravel Sail](https://laravel.com/docs/8.x/sail) is used to install dependencies, run migrations, run the app, etc for local development.
- [Laravel Mix](https://laravel.com/docs/8.x/mix) is used to compile CSS and JS.
# mell07
