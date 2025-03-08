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

## 🔌 API Endpoints

All API endpoints except authentication endpoints require Bearer token authentication.

### Authentication Endpoints

- **POST `/api/register`**
    - Register a new user
    - Body: `{
    "name": "admin",
    "email": "admin@admin.com",
    "password": "pA5sword!",
    "password_confirmation": "pA5sword!"
}`
    - Returns: User object

- **POST `/api/login`**
    - Login user
    - Body: ```{ "email": string, "password": string }```
    - Returns: User object and authentication token

- **POST `/api/logout`**
    - Logout user (requires authentication)
    - Returns: Success message

### Company Endpoints

- **GET `/api/companies`**
    - Get paginated list of companies
    - Returns: Paginated companies list (15 per page)

- **GET `/api/companies/{company}`**
    - Get single company details
    - Returns: Company object

- **POST `/api/companies`**
    - Create new company
    - Body: Company data
    - Returns: Created company object

- **PUT `/api/companies/{company}`**
    - Update company details
    - Body: Updated company data
    - Returns: Updated company object

- **DELETE `/api/companies/{company}`**
    - Delete a company
    - Returns: HTTP 200 on success

### Employee Endpoints

- **GET `/api/companies/{company}/employees`**
    - Get all employees for a specific company
    - Returns: List of employees

- **POST `/api/companies/{company}/employees`**
    - Add new employee to a company
    - Body: Employee data
    - Returns: HTTP 201 on success

- **GET `/api/employees/{employee}`**
    - Get single employee details
    - Returns: Employee object

- **PUT `/api/employees/{employee}`**
    - Update employee details
    - Body: Updated employee data
    - Returns: Updated employee object

- **DELETE `/api/employees/{employee}`**
    - Delete an employee
    - Returns: HTTP 200 on success

All endpoints return appropriate HTTP status codes and JSON responses. Error responses include relevant error messages.
