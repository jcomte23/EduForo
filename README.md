<p align="center">
  <img src="public/img/logoAPP.png" alt="EduForo logo" width="140">
</p>

<h1 align="center">EduForo</h1>

<p align="center">
  An academic forum for sharing and publishing information about academic topics.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/status-archived-lightgrey" alt="Status: archived">
  <img src="https://img.shields.io/badge/Laravel-10-FF2D20?logo=laravel&logoColor=white" alt="Laravel 10">
  <img src="https://img.shields.io/badge/PHP-8.1%2B-777BB4?logo=php&logoColor=white" alt="PHP 8.1+">
  <img src="https://img.shields.io/badge/Livewire-2-4E56A6?logo=livewire&logoColor=white" alt="Livewire 2">
  <img src="https://img.shields.io/badge/Tailwind_CSS-3-06B6D4?logo=tailwindcss&logoColor=white" alt="Tailwind CSS 3">
  <img src="https://img.shields.io/badge/license-MIT-blue" alt="MIT License">
</p>

<p align="center">
  <strong>English</strong> · <a href="README.es.md">Español</a>
</p>

---

> [!NOTE]
> **This project is archived.** EduForo was one of my first web applications, built in June 2023 while I was learning Laravel. It is kept as it was, rough edges included, as a record of where I started. It is not maintained and does not accept contributions.

## About

EduForo is a small community board where students and teachers can sign up and post short messages about academic topics. Anyone can read the latest posts on the public home page. Registered users get a personal dashboard where they can manage their own posts.

## Features

- **Public feed**: the home page shows every post from newest to oldest, with the author's name and profile photo, paginated.
- **Post management**: signed-in users can create, view, edit and delete their own posts. An authorization policy stops anyone from touching another user's posts.
- **Full account system** (Laravel Jetstream + Fortify):
  - Sign up with terms of service and privacy policy acceptance
  - Log in, log out and password reset
  - Two-factor authentication (2FA)
  - Profile photo upload
  - Management of active browser sessions
  - Account deletion
- **Four languages**: English, Spanish, French and Italian. The chosen language is stored in a cookie and applied by a custom middleware.
- **Dark mode** support in the interface.
- **Tests**: feature and unit tests with PHPUnit for posts, public pages and authentication.

## Tech stack

| Layer | Technology |
|---|---|
| Backend | PHP 8.1+, Laravel 10 |
| Authentication | Laravel Jetstream 3, Fortify, Sanctum |
| Frontend | Blade, Livewire 2, Alpine.js, Tailwind CSS 3 |
| Build tool | Vite 4 |
| Database | MySQL (SQLite in memory for tests) |
| Translations | laravel-lang |
| Testing | PHPUnit 10 |

## Project structure

```
app/
├── Http/Controllers/
│   ├── PostController.php          # CRUD for the signed-in user's posts
│   ├── PublicPagesController.php   # Public home feed
│   └── LanguagesController.php     # Language switcher
├── Http/Middleware/
│   └── LanguagesMiddleware.php     # Applies the locale stored in the cookie
├── Models/                         # User and Post
└── Policies/PostPolicy.php         # Only the author can manage a post
lang/                               # en, es, fr and it translations
resources/views/posts/              # Post views (index, create, edit, show)
resources/markdown/                 # Terms of service and privacy policy
```

## Running it locally

If you want to try it out, you need PHP 8.1+, Composer, Node.js and MySQL.

```bash
git clone https://github.com/jcomte23/EduForo.git
cd EduForo

composer install
npm install

cp .env.example .env
php artisan key:generate
# Set your database credentials in .env

php artisan migrate
php artisan storage:link

npm run build
php artisan serve
```

Then open `http://localhost:8000`.

To add sample data, uncomment `Post::factory(50)->create();` in `database/seeders/DatabaseSeeder.php` and run `php artisan db:seed`.

To run the tests:

```bash
php artisan test
```

## Author

**Javier Cómbita Téllez**, [javiercombita.com](https://javiercombita.com)

## License

This project is licensed under the MIT license.
