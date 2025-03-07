<?php

namespace App\DataTransferObjects;

abstract readonly class Dto
{
    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        $properties = get_object_vars($this);

        $data = array_map(function ($value) {
            return $value;
        }, $properties);

        return array_filter($data, function ($data) {
            return $data !== '';
        });
    }
}
