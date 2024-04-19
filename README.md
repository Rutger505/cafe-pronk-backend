# cafe-pronk-backend

School project, making Cafe Pronk. Backend in Laravel, [Frontend](https://github.com/Rutger505/cafe-pronk-frontend) in Next.js

## Installation

1. Clone the repository
2. Copy `.env.example` to `.env`
3. Generate a new key: `php artisan key:generate`
4. Create a `database.sqlite` file in the database folder
5. Install dependencies: `composer install`
6. Seed the database: `php artisan migrate:fresh --seed`
7. Start the api: `php artisan serve`

### Troubleshooting

If you installed PHP on Windows you may need to enable these extensions in `php.ini`:

- `extension=curl`
- `extension=fileinfo`
- `extension=mbstring`
- `extension=openssl`
- `extension=pdo_sqlite`
- `extension=sqlite3`

If you can only find the php.ini-development or php.ini-production file, you can just copy one of them to php.ini.
