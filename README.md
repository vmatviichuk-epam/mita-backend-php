# MITA Backend - PHP (Laravel)

Laravel 12 backend for the Mini Issue Tracker Application.

## Tech Stack

- **Laravel 12**
- **Laravel Sanctum** (for API authentication)
- **MySQL** (to be implemented)

## Getting Started

### Prerequisites

- PHP 8.2+
- Composer
- MySQL 8.0 (for later implementation)

### Quick Setup (Recommended)

The easiest way to get started is to create a fresh Laravel project and copy over the custom files:

```bash
# Create a fresh Laravel 12 project
composer create-project laravel/laravel mita-backend-php
cd mita-backend-php

# Clone this repo's custom files
git clone https://github.com/vmatviichuk-epam/mita-backend-php.git temp-mita
cp temp-mita/app/Http/Controllers/AuthController.php app/Http/Controllers/
cp temp-mita/routes/api.php routes/
cp temp-mita/config/cors.php config/
rm -rf temp-mita

# Generate app key
php artisan key:generate

# Run the server
php artisan serve --port=8000
```

### Alternative: Use This Repo Directly

```bash
# Clone with submodule
git clone --recurse-submodules https://github.com/vmatviichuk-epam/mita-backend-php.git
cd mita-backend-php

# Install dependencies
composer install

# Copy environment file and generate key
cp .env.example .env
php artisan key:generate

# Run the server
php artisan serve --port=8000
```

The API will be available at `http://localhost:8000`

## API Endpoints

### Implemented (Skeleton)

| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/auth/login` | Login (returns mock JWT) |

### To Implement (Workshop)

| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/auth/register` | User registration |
| POST | `/api/auth/logout` | User logout |
| GET | `/api/issues` | List user's issues |
| POST | `/api/issues` | Create issue |
| GET | `/api/issues/{id}` | Get issue |
| PUT | `/api/issues/{id}` | Update issue |
| DELETE | `/api/issues/{id}` | Delete issue |

## Testing the Login Endpoint

```bash
curl -X POST http://localhost:8000/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{"username": "testuser", "password": "password123"}'
```

Response:
```json
{
  "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxIiwidXNlcm5hbWUiOiJ0ZXN0dXNlciJ9.MOCK",
  "user": {
    "id": 1,
    "username": "testuser"
  }
}
```

## Key Files

```
app/Http/Controllers/
└── AuthController.php     # Authentication endpoints

routes/
└── api.php                # API route definitions

config/
└── cors.php               # CORS configuration for frontend
```

## Workshop Tasks

1. **Database Setup** - Configure MySQL, run migrations
2. **User Model** - Create User model with migration
3. **User Registration** - Implement `/api/auth/register` with password hashing
4. **Sanctum Auth** - Configure Laravel Sanctum for API tokens
5. **Issue CRUD** - Create Issue model and implement all endpoints
6. **User Isolation** - Use middleware to ensure users access only their issues

## API Contract

See [mita-api-contract](https://github.com/vmatviichuk-epam/mita-api-contract) for the OpenAPI specification.

## License

MIT
