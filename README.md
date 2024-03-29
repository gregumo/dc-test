# DC test

## Getting Started

1 - Install Docker

2 - Clone this project repository
```
git clone https://github.com/gregumo/dc-test
````

3 - In your application folder, install Laravel dependencies with Composer (and without Sail)
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
```

4 - Copy env example file
```
cp .env.example .env
```

5 - Launch Docker images with Sail
```
./vendor/bin/sail up -d
```

6 - Generate application encryption key
```
./vendor/bin/sail php artisan key:generate
```

7 - Setup database
```
./vendor/bin/sail php artisan migrate
```

8 - Install node dependencies
```
./vendor/bin/sail npm install
```

9 - Fetch data from Nantes Metropole API
```
./vendor/bin/sail php artisan fetch:composters
```

10 - Go to your application root url 
```
http://localhost
```

## API
You can find Laravel API entrypoints here :
- GET /api/composters
- GET /api/composters/{slug}
