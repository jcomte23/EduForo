<p align="center">
  <img src="public/img/logoAPP.png" alt="Logo de EduForo" width="140">
</p>

<h1 align="center">EduForo</h1>

<p align="center">
  Un foro académico para compartir y publicar información sobre temas académicos.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/estado-archivado-lightgrey" alt="Estado: archivado">
  <img src="https://img.shields.io/badge/Laravel-10-FF2D20?logo=laravel&logoColor=white" alt="Laravel 10">
  <img src="https://img.shields.io/badge/PHP-8.1%2B-777BB4?logo=php&logoColor=white" alt="PHP 8.1+">
  <img src="https://img.shields.io/badge/Livewire-2-4E56A6?logo=livewire&logoColor=white" alt="Livewire 2">
  <img src="https://img.shields.io/badge/Tailwind_CSS-3-06B6D4?logo=tailwindcss&logoColor=white" alt="Tailwind CSS 3">
  <img src="https://img.shields.io/badge/licencia-MIT-blue" alt="Licencia MIT">
</p>

<p align="center">
  <a href="README.md">English</a> · <strong>Español</strong>
</p>

---

> [!NOTE]
> **Este proyecto está archivado.** EduForo fue una de mis primeras aplicaciones web. La construí en junio de 2023 mientras aprendía Laravel. Se conserva tal como quedó, con sus imperfecciones incluidas, como recuerdo de mis comienzos. No recibe mantenimiento ni acepta contribuciones.

## Acerca del proyecto

EduForo es un pequeño tablón comunitario donde estudiantes y docentes pueden registrarse y publicar mensajes cortos sobre temas académicos. Cualquier persona puede leer las publicaciones más recientes en la página de inicio pública. Los usuarios registrados tienen un panel personal para gestionar sus propias publicaciones.

## Funcionalidades

- **Muro público**: la página de inicio muestra todas las publicaciones, de la más reciente a la más antigua, con el nombre y la foto de perfil del autor, con paginación.
- **Gestión de publicaciones**: los usuarios con sesión iniciada pueden crear, ver, editar y eliminar sus propias publicaciones. Una política de autorización impide modificar las de otros usuarios.
- **Sistema de cuentas completo** (Laravel Jetstream + Fortify):
  - Registro con aceptación de términos de servicio y política de privacidad
  - Inicio y cierre de sesión, y recuperación de contraseña
  - Autenticación de dos factores (2FA)
  - Foto de perfil
  - Gestión de sesiones activas en otros navegadores
  - Eliminación de la cuenta
- **Cuatro idiomas**: inglés, español, francés e italiano. El idioma elegido se guarda en una cookie y lo aplica un middleware propio.
- **Modo oscuro** en la interfaz.
- **Pruebas**: pruebas funcionales y unitarias con PHPUnit para publicaciones, páginas públicas y autenticación.

## Tecnologías

| Capa | Tecnología |
|---|---|
| Backend | PHP 8.1+, Laravel 10 |
| Autenticación | Laravel Jetstream 3, Fortify, Sanctum |
| Frontend | Blade, Livewire 2, Alpine.js, Tailwind CSS 3 |
| Compilación | Vite 4 |
| Base de datos | MySQL (SQLite en memoria para las pruebas) |
| Traducciones | laravel-lang |
| Pruebas | PHPUnit 10 |

## Estructura del proyecto

```
app/
├── Http/Controllers/
│   ├── PostController.php          # CRUD de las publicaciones del usuario
│   ├── PublicPagesController.php   # Muro público de inicio
│   └── LanguagesController.php     # Selector de idioma
├── Http/Middleware/
│   └── LanguagesMiddleware.php     # Aplica el idioma guardado en la cookie
├── Models/                         # User y Post
└── Policies/PostPolicy.php         # Solo el autor puede gestionar su publicación
lang/                               # Traducciones en, es, fr e it
resources/views/posts/              # Vistas de publicaciones (index, create, edit, show)
resources/markdown/                 # Términos de servicio y política de privacidad
```

## Ejecutarlo en local

Si quieres probarlo, necesitas PHP 8.1+, Composer, Node.js y MySQL.

```bash
git clone https://github.com/jcomte23/EduForo.git
cd EduForo

composer install
npm install

cp .env.example .env
php artisan key:generate
# Configura las credenciales de la base de datos en .env

php artisan migrate
php artisan storage:link

npm run build
php artisan serve
```

Luego abre `http://localhost:8000`.

Para cargar datos de ejemplo, descomenta `Post::factory(50)->create();` en `database/seeders/DatabaseSeeder.php` y ejecuta `php artisan db:seed`.

Para ejecutar las pruebas:

```bash
php artisan test
```

## Autor

**Javier Cómbita Téllez**, [javiercombita.com](https://javiercombita.com)

## Licencia

Este proyecto se distribuye bajo la licencia MIT.
