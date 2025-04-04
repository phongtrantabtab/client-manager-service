<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Contracts\Repositories\ProvinceRepositoryInterface;

readonly class AddressService
{
    /**
     * Constructor
     *
     * @param ProvinceRepositoryInterface $provinceRepository
     */
    public function __construct(
        private ProvinceRepositoryInterface $provinceRepository,
    ) {
    }

    /**
     * Get mapping address data
     *
     * @return Collection
     */
    public function getMappingData(): Collection
    {
        return $this->provinceRepository->query()->with('districts.wards')->get();
    }
}
