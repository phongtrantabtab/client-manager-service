<?php

namespace App\Http\Entities\Address;

class AddressEntity
{
    public ProvinceEntity $province;

    public DistrictEntity $district;

    public WardEntity $ward;

    public ?string $full_address;

    /**
     * Constructor
     */
    public function __construct(array $params = [], string $fullAddress = '')
    {
        $this->province = new ProvinceEntity($params['province'] ?? null);
        $this->district = new DistrictEntity($params['district'] ?? null);
        $this->ward = new WardEntity($params['ward'] ?? null);
        $this->full_address = $fullAddress;
    }
}
