# 04 - Pendientes

## Sin verificar (no había MySQL local; ahora hay Sail, ver `05-sail.md`)

- Login/logout, registro y reset de password.
- Panel admin completo (ABM, imports/exports Excel).
- Canjes, MercadoLibre (`MeliController`), MailChimp, API `/api/*`.
- Migraciones y seeders (`database/seeds` sigue por classmap).

Verificado: app arranca, páginas públicas responden 200, rutas protegidas redirigen a login, las 70 views compilan (`php artisan view:cache`).

## Deuda conocida

- `routes/web.php` referencia `Backend\EmailsController`, que no existe. Rompe `php artisan route:list`.
- `.env.example` contiene una contraseña SMTP real: rotarla y dejar el valor vacío.
- Archivos `*_backup.php` en controllers no cumplen PSR-4 (aviso de composer); candidatos a borrar.
- `config/excel.php` eliminado (ya no aplica).
- Assets: gulp/elixir removido; no hay build de frontend. Usar los compilados en `public/assets`.
