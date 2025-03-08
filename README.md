# Company Registry

## Setup
1. Copy the environment file:
```bash
cp .env.example .env
```

2. Install sail:
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

3. Start the Docker environment:
```bash
./vendor/bin/sail up -d
```

4. Install PHP dependencies:
```bash
./vendor/bin/sail composer install
```


5. Generate application key:
```bash
./vendor/bin/sail artisan key:generate
```

6. Run database migrations:
```bash
./vendor/bin/sail artisan migrate
```

## Docker Services

The application runs with the following services:
- **Laravel Application**: Running on port 80
- **MySQL Database**: Running on port 3306
- **PHPMyAdmin**: Available on port 8081
