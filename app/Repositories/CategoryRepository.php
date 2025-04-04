<?php

namespace App\Repositories;

use App\Models\Category\Category;
use App\Contracts\Repositories\DistrictRepositoryInterface;

class CategoryRepository extends BaseRepository implements DistrictRepositoryInterface
{
    /**
     * Get model
     */
    public function getModel(): string
    {
        return Category::class;
    }
}
