# DC test

## Getting Started

1 - Install Docker

2 - Clone this project repository
```
git clone
````

3 - Install Laravel dependencies with Composer (and without Sail)
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
```

4 - Launch Docker images with Sail
```
./vendor/bin/sail up -d
```

5 - Install node dependencies
```
./vendor/bin/sail npm install
```

6 - Setup database
```
./vendor/bin/sail php artisan migration:install
```

7 - Fetch data from Nantes Metropole API
```
./vendor/bin/sail php artisan fetch:composters
```

8 - Go to your application root url 
```
http://localhost
```

## API
You can find Laravel API entrypoints here :
- GET /api/composters
- GET /api/composters/{slug}
