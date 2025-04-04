<?php

namespace App\Repositories;

use App\Models\Address\Ward;
use App\Contracts\Repositories\WardRepositoryInterface;

class WardRepository extends BaseRepository implements WardRepositoryInterface
{
    /**
     * Get model
     */
    public function getModel(): string
    {
        return Ward::class;
    }
}
