# 01 - Upgrade Laravel 5.2 a 12

- **Rama:** `upgrade-laravel-12`
- **Método:** esqueleto Laravel 12 nuevo, código de la app portado encima (no se subió versión por versión).
- **Requisito:** PHP ^8.2 (probado con 8.3).

## Estructura

| Antes (5.2) | Ahora (12) |
|-------------|------------|
| `app/Http/Kernel.php` | `bootstrap/app.php` (alias `admin` para `App\Http\Middleware\Admin`) |
| `app/Http/routes.php` | `routes/web.php`, cargado con namespace `App\Http\Controllers` |
| `RouteServiceProvider`, `AuthServiceProvider`, `EventServiceProvider` | eliminados |
| `EncryptCookies`, `VerifyCsrfToken`, `Authenticate`, `RedirectIfAuthenticated` | los del framework |
| `app/Exceptions/Handler.php`, `app/Console/Kernel.php` | eliminados |
| `bootstrap/autoload.php`, `config/compile.php`, `config/jsonapi.php` | eliminados |
| gulp + elixir (`gulpfile.js`, `package.json`) | eliminados |

El namespace en `bootstrap/app.php` mantiene los strings `'Backend\X@metodo'` de las rutas sin reescribirlos.

## Auth

`Route::auth()` ya no existe. Se usa `laravel/ui`: controllers en `app/Http/Controllers/Auth` y `Auth::routes(['confirm' => false, 'verify' => false])`.
Se agregó `GET /logout` porque las views lo linkean (en 5.2 logout era GET).

## Config

- `config/*` tomada del esqueleto nuevo, con lo propio reaplicado:
  - `services.mailchimp.key`
  - locale `es`
  - MySQL `strict => false` (igual que 5.2)
  - disco `local` en `storage/app` (el default nuevo es `storage/app/private`; rompería rutas de archivos subidos)
- `.env.example`: claves renombradas (`CACHE_STORE`, `QUEUE_CONNECTION`, `MAIL_MAILER`, `MAIL_SCHEME`) y `MAILCHIMP_KEY`.

## Otros

- `Controller` base sin `AuthorizesResources` (removido).
- `Paginator::useBootstrapThree()` en `AppServiceProvider` (el default ahora es Tailwind).
- `Functions::sendMail`: parámetro opcional antes de requerido corregido.
- Tests: `Tests\TestCase` y `Tests\BasicTest` con namespace, PHPUnit 11.
