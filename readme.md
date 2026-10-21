# SOS Claro

Aplicación Laravel 12 (PHP ^8.2): panel de administración, sitio de usuarios y API.

## Requisitos

- PHP ^8.2 con extensiones habituales de Laravel (mbstring, pdo_mysql, zip, gd)
- Composer 2
- MySQL (o Docker, para usar Sail)

## Instalación

```bash
composer install
cp .env.example .env
php artisan key:generate
# completar DB_*, MAIL_* y MAILCHIMP_KEY en .env
php artisan migrate --seed
php artisan serve
```

### Con Laravel Sail (Docker)

```bash
composer install
cp .env.example .env   # DB_HOST=mysql, DB_USERNAME=sail, DB_PASSWORD=password
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
```

Detalle y cambios de configuración en [Docs/Briefs/05-sail.md](Docs/Briefs/05-sail.md).

## Estructura

- `routes/web.php`: todas las rutas (admin, frontend, `/api`).
- `app/Http/Controllers/{Backend,Frontend,Api}`: controllers.
- `app/Support/Excel.php`: capa de compatibilidad para imports/exports (ver `Docs/Briefs/03-excel-shim.md`).
- `database/seeds`: seeders (cargados por classmap).

## Upgrade desde Laravel 5.2

Historial de decisiones y pendientes en [Docs/Briefs](Docs/Briefs/README.md).
