<?php

namespace App\Repositories;

use App\Models\User\User;
use App\Contracts\Repositories\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Get model
     */
    public function getModel(): string
    {
        return User::class;
    }
}
