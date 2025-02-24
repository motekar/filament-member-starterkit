# Filament Member Starter Kit

A Laravel-based starter kit built with [Filament Admin](https://filamentphp.com/) that provides essential member management features. This starter kit is perfect for projects that need a robust member management system with a beautiful admin interface.

## Features

- 🚀 Built with Laravel 11 and PHP 8.2
- 💼 Filament Admin v3.2 for beautiful admin interface
- ⏰ Time picker integration
- 🔐 Login link functionality
- 👥 User impersonation capability
- 🎨 TailwindCSS for styling
- ✅ Pest PHP for testing

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js & PNPM
- MySQL/PostgreSQL

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd filament-member-starterkit
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install frontend dependencies:
```bash
pnpm install
```

4. Copy environment file and configure:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Run migrations:
```bash
php artisan migrate
```

7. Run seeder:
```bash
php artisan db:seed
```

8. Build assets:
```bash
pnpm run build
```

## Development

- Run development server:
```bash
php artisan serve
```

- Watch for asset changes:
```bash
pnpm run dev
```

## Testing

Run tests using Pest:
```bash
php artisan test
```

## Key Packages

- [Filament Admin](https://filamentphp.com/) - Admin panel framework
- [Laravel Login Link](https://github.com/spatie/laravel-login-link) - Magic login links
- [Filament Impersonate](https://github.com/stechstudio/filament-impersonate) - User impersonation

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).
