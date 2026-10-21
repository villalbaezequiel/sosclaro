# SOS Claro

Aplicación Laravel 12 (PHP ^8.2): panel de administración, sitio de usuarios y API.

## Requisitos

- PHP ^8.2 con extensiones habituales de Laravel (mbstring, pdo_mysql, zip, gd)
- Composer 2
- MySQL

## Instalación

```bash
composer install
cp .env.example .env
php artisan key:generate
# completar DB_*, MAIL_* y MAILCHIMP_KEY en .env
php artisan migrate --seed
php artisan serve
```

## Estructura

- `routes/web.php`: todas las rutas (admin, frontend, `/api`).
- `app/Http/Controllers/{Backend,Frontend,Api}`: controllers.
- `app/Support/Excel.php`: capa de compatibilidad para imports/exports (ver `Docs/Briefs/03-excel-shim.md`).
- `database/seeds`: seeders (cargados por classmap).

## Upgrade desde Laravel 5.2

Historial de decisiones y pendientes en [Docs/Briefs](Docs/Briefs/README.md).
