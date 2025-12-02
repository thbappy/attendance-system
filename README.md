# Attendance System - Laravel 11

A simple **Attendance System** built with **Laravel 11** for managing employees, shifts, and attendance.

## Git Repository

```bash
git clone https://github.com/thbappy/attendance-system
cd attendance-system
```

## Requirements

* PHP >= 8.2
* Composer
* MySQL or any supported database
* Node.js & npm (for frontend assets if needed)

## Installation

1. **Copy `.env` file**:

```bash
cp .env.example .env
```

2. **Install dependencies**:

```bash
composer install
npm install
npm run dev
```

3. **Generate application key**:

```bash
php artisan key:generate
```

4. **Configure database** in `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=attendance_system
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run migrations and seed database**:

```bash
php artisan migrate --seed
```

> The seeder will create default employees and admin users.

## Login Credentials

You can use the default admin credentials:

```text
Email: tanbeer@gmail.com
Password: password
```

> Make sure to change the password after first login.

## Running the Project

```bash
php artisan serve
```

Open your browser and visit: `http://127.0.0.1:8000`

## API Endpoints

| Method | URL                            | Description           |
| ------ | ------------------------------ | --------------------- |
| POST   | /api/login                     | Login    |
| GET    | /api/employees                 | List all employees    |
| POST   | /api/employees                 | Create new employee   |
| GET    | /api/employees/{id}            | Show employee details |
| PUT    | /api/employees/{id}            | Update employee       |
| DELETE | /api/employees/{id}            | Delete employee       |
| GET    | /api/shifts                    | List all shifts       |
| POST   | /api/shifts                    | Create new shift      |
| POST   | /api/attendance/check-in       | Employee check-in     |
| POST   | /api/attendance/{id}/check-out | Employee check-out    |
| POST   | /api/attendance/{id}/break-in  | Employee break-in  |
| POST   | /api/attendance/{id}/break-out  | Employee break-out  |


## Database Seeding Example

Seeder file example (`DatabaseSeeder.php`):

```php
\App\Models\User::create([
    'name' => 'Admin User',
    'email' => 'tanbeer@gmail.com',
    'password' => Hash::make('password'),
]);
```


