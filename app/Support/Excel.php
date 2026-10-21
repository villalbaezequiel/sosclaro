<?php

namespace App\Support;

use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

/**
 * Minimal replacement for the maatwebsite/excel 2.x API (create/sheet/fromArray/export/store, load/get)
 * on top of PhpSpreadsheet, which maatwebsite/excel 3.x already pulls in.
 */
class Excel
{
    protected $title;
    protected $spreadsheet;
    protected $sheets = 0;

    protected $ignoreEmpty = false;
    protected $path;

    public static function create($title, $callback)
    {
        $excel = new static();
        $excel->title = $title;
        $excel->spreadsheet = new Spreadsheet();
        $callback($excel);

        return $excel;
    }

    public static function load($path, $callback = null)
    {
        $excel = new static();
        $excel->path = $path;

        return $excel;
    }

    public function sheet($name, $callback)
    {
        $sheet = $this->sheets === 0
            ? $this->spreadsheet->getActiveSheet()
            : $this->spreadsheet->createSheet();
        $this->sheets++;

        // Excel limits sheet titles to 31 chars and forbids some symbols
        $sheet->setTitle(substr(preg_replace('/[\\\\\/\?\*\[\]:]/', '', $name), 0, 31));
        $callback(new Sheet($sheet));

        return $this;
    }

    public function ignoreEmpty($value = true)
    {
        $this->ignoreEmpty = $value;

        return $this;
    }

    /**
     * Rows of the first sheet as objects keyed by the slugified heading row.
     */
    public function get()
    {
        $sheet = IOFactory::load($this->path)->getSheet(0);
        $rows = $sheet->toArray(null, true, true, false);
        $headings = array_map(function ($heading) {
            return trim(preg_replace('/[^a-z0-9]+/', '_', strtolower((string) $heading)), '_');
        }, array_shift($rows) ?: []);

        $result = [];
        foreach ($rows as $row) {
            if ($this->ignoreEmpty && count(array_filter($row, fn ($v) => $v !== null && $v !== '')) === 0) {
                continue;
            }
            $result[] = new Row(array_combine($headings, array_pad(array_slice($row, 0, count($headings)), count($headings), null)));
        }

        return new Collection($result);
    }

    /**
     * Send the file to the browser and end the request.
     */
    public function export($format = 'xls')
    {
        $writer = $this->writer($format);
        $mime = $format === 'xlsx' ? 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' : 'application/vnd.ms-excel';

        header('Content-Type: '.$mime);
        header('Content-Disposition: attachment; filename="'.$this->title.'.'.$format.'"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }

    public function store($format = 'xls', $path = null)
    {
        $dir = $path ? (str_starts_with($path, '/') ? $path : storage_path($path)) : storage_path('exports');
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
        $this->writer($format)->save($dir.'/'.$this->title.'.'.$format);

        return $this;
    }

    protected function writer($format)
    {
        return IOFactory::createWriter($this->spreadsheet, ucfirst(strtolower($format)));
    }
}
