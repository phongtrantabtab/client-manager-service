<?php

namespace App\Http\Entities\Address;

use App\Models\Address\Province;

class ProvinceEntity
{
    public ?string $code;

    public ?string $name;

    public ?string $name_en;

    public ?string $full_name;

    public ?string $full_name_en;

    /**
     * Constructor
     */
    public function __construct(?Province $province)
    {
        $this->code = $province->code ?? null;
        $this->name = $province->name ?? null;
        $this->name_en = $province->name_en ?? null;
        $this->full_name = $province->full_name ?? null;
        $this->full_name_en = $province->full_name_en ?? null;
    }
}
