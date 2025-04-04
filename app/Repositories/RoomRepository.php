<?php

namespace App\Repositories;

use App\Models\Room\Room;
use App\Contracts\Repositories\RoomRepositoryInterface;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{
    /**
     * Get model
     */
    public function getModel(): string
    {
        return Room::class;
    }
}
