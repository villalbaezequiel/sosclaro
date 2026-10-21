<?php

namespace App\Support;

/**
 * Spreadsheet row; unknown columns read as null like maatwebsite/excel 2.x did.
 */
class Row
{
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function __get($key)
    {
        return $this->attributes[$key] ?? null;
    }

    public function __isset($key)
    {
        return isset($this->attributes[$key]);
    }

    public function toArray()
    {
        return $this->attributes;
    }
}
