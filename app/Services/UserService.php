<?php

namespace App\Services;

use App\Contracts\Repositories\UserRepositoryInterface;

class UserService extends BaseService
{
    /**
     * Constructor
     */
    public function __construct(
        protected UserRepositoryInterface $userRepository
    ) {
        $this->repository = $this->userRepository;
    }
}
