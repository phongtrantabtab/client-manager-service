<?php

namespace App\Repositories;

use App\Models\Address\District;
use App\Contracts\Repositories\DistrictRepositoryInterface;

class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    /**
     * Get model
     */
    public function getModel(): string
    {
        return District::class;
    }
}
