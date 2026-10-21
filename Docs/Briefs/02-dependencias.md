# 02 - Dependencias

| Paquete anterior | Resultado | Motivo |
|------------------|-----------|--------|
| `laravel/framework 5.2.*` | `^12.0` | objetivo |
| `laravelcollective/html ^5.2` | `rdx/laravelcollective-html ^6.7` | el original no soporta L12; el fork mantiene namespace `Collective\Html` y los facades `Form`/`Html` (70 views los usan) |
| `maatwebsite/excel ^3.1` (instalado: 2.1.27) | eliminado, reemplazado por `phpoffice/phpspreadsheet ^5.10` + `App\Support\Excel` | el código usa la API 2.x, que no existe en 3.x |
| `nilportugues/laravel5-json-api` | eliminado | abandonado; los transformers en `app/Model/Api` solo se registraban en config, sin uso |
| `doctrine/dbal` | eliminado | Laravel 11+ lo trae integrado para `->change()` |
| `guzzlehttp/guzzle ^6.3` | `^7.0` | |
| `drewm/mailchimp-api ^2.5` | sin cambios | |
| (nuevo) `laravel/ui ^4.6` | agregado | scaffolding de auth |
| `phpunit ~4`, `mockery 0.9`, `fzaninotto/faker` | `phpunit ^11.5`, `mockery ^1.6`, `fakerphp/faker` | |
