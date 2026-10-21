# 05 - Laravel Sail

Entorno local en Docker con `laravel/sail` (dev dependency).

## Cambios

- `composer.json`: agrega `laravel/sail ^1.69` en `require-dev`.
- `compose.yaml`: servicios `laravel.test` (PHP 8.5) y `mysql` (`mysql:8.4`).
- `.env` (no versionado): `DB_HOST=mysql`, `DB_USERNAME=sail`, `DB_PASSWORD=password`. Fuera de Docker, volver a `DB_HOST=127.0.0.1`.
- `phpunit.xml`: se quitó `DB_CONNECTION=sqlite` / `DB_DATABASE=:memory:` y se puso `DB_DATABASE=testing`. Los tests corren contra MySQL.

## Uso

```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate --seed
./vendor/bin/sail test
```

## Notas

- `sail:install` se colgó al final en la instalación inicial; `compose.yaml` y `.env` quedaron escritos, pero `sail up` no fue probado.
- Con MySQL disponible se puede verificar la lista de `04-pendientes.md`.
