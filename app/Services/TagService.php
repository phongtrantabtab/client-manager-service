<?php

namespace App\Services;

use App\Contracts\Repositories\TagRepositoryInterface;

class TagService extends BaseService
{
    /**
     * Constructor
     */
    public function __construct(
        protected TagRepositoryInterface $tagRepository
    ) {
        $this->repository = $this->tagRepository;
    }
}
