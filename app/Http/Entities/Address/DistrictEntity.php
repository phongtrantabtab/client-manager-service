<?php

namespace App\Http\Entities\Address;

use App\Models\Address\District;

class DistrictEntity
{
    public ?string $code;

    public ?string $name;

    public ?string $name_en;

    public ?string $full_name;

    public ?string $full_name_en;

    public ?string $province_code;

    /**
     * Constructor
     */
    public function __construct(?District $district)
    {
        $this->code = $district->code ?? null;
        $this->name = $district->name ?? null;
        $this->name_en = $district->name_en ?? null;
        $this->full_name = $district->full_name ?? null;
        $this->full_name_en = $district->full_name_en ?? null;
        $this->province_code = $district->province_cod ?? null;
    }
}
