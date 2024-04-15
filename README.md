# cafe-pronk-backend

School project, making a cafe. Backend in Laravel, [Frontend](https://github.com/Rutger505/cafe-pronk-frontend) in Next.js

## Installation

1. Clone the repository
2. Copy `.env.example` to `.env`
3. Generate a new key: `php artisan key:generate`
4. Create a `database.sqlite` file in the database folder
5. Install dependencies: `composer install`
6. Seed the database: `php artisan migrate:fresh --seed`
7. Start the api: `php artisan serve`
