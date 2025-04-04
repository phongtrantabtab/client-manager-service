<?php

namespace App\Repositories;

use App\Models\House\House;
use App\Contracts\Repositories\HouseRepositoryInterface;

class HouseRepository extends BaseRepository implements HouseRepositoryInterface
{
    /**
     * Get model
     */
    public function getModel(): string
    {
        return House::class;
    }
}
