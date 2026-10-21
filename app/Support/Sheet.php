<?php

namespace App\Support;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Sheet
{
    protected $sheet;

    public function __construct(Worksheet $sheet)
    {
        $this->sheet = $sheet;
    }

    /**
     * Write a list of rows (arrays/objects/models); the keys of the first row become the heading row.
     */
    public function fromArray($source)
    {
        $rows = json_decode(json_encode($source), true) ?: [];
        if (! $rows) {
            return $this;
        }

        $rows = array_values($rows);
        $headings = array_keys($rows[0]);
        $data = [$headings];
        foreach ($rows as $row) {
            $data[] = array_map(function ($key) use ($row) {
                $value = $row[$key] ?? null;

                return is_array($value) ? json_encode($value) : $value;
            }, $headings);
        }
        $this->sheet->fromArray($data, null, 'A1', true);

        return $this;
    }
}
