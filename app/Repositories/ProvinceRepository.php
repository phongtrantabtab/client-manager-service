<?php

namespace App\Repositories;

use App\Models\Address\Province;
use App\Contracts\Repositories\ProvinceRepositoryInterface;

class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
    /**
     * Get model
     */
    public function getModel(): string
    {
        return Province::class;
    }
}
