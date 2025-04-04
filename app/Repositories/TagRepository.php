<?php

namespace App\Repositories;

use App\Models\Tag\Tag;
use App\Contracts\Repositories\TagRepositoryInterface;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    /**
     * Get model
     */
    public function getModel(): string
    {
        return Tag::class;
    }
}
