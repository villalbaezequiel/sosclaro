# 03 - Excel shim

`maatwebsite/excel` 2.x -> 3.x cambia toda la API. En vez de reescribir los ~20 usos, se creó una capa mínima en `app/Support`:

- `Excel.php`: `create($nombre, fn)`, `sheet($nombre, fn)`, `export($formato)`, `store($formato, $ruta)`, `load($path)`, `ignoreEmpty()`, `get()`.
- `Sheet.php`: `fromArray($filas)`; las claves de la primera fila son el encabezado. Acepta arrays, objetos y colecciones Eloquent.
- `Row.php`: fila leída; columnas inexistentes devuelven `null` (como en 2.x). Encabezados normalizados a minúsculas con `_`.

Los controllers importan `use App\Support\Excel;`.

## Diferencias respecto a 2.x

- `export()` envía headers y termina el request con `exit`, igual que antes.
- `store('xls', 'exports')` guarda en `storage/exports` (ruta relativa a `storage_path`, o absoluta si empieza con `/`).
- Solo se implementó lo que el código usa. Estilos, formatos de columna, `loadView`, etc. no existen.
- Verificado: escritura xls/xlsx y lectura con encabezados. **No** verificado con datos reales de DB.

Si hace falta más API, ver `docs.laravel-excel.com` y migrar controller por controller a `Maatwebsite\Excel` 3.x.
