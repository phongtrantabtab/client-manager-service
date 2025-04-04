<?php

namespace App\Http\Entities\Room;

class RoomDetailEntity
{
    public ?int $capacity;

    public ?int $floor;

    public ?string $more;

    public ?string $size;

    public ?string $apartment_type;

    public ?string $current_condition;

    /**
     * Constructor
     */
    public function __construct(array $data = [])
    {
        $this->capacity = $data['capacity'] ?? null;
        $this->floor = $data['floor'] ?? null;
        $this->more = $data['more'] ?? null;
        $this->size = $data['size'] ?? null;
        $this->apartment_type = $data['apartment_type'] ?? null;
        $this->current_condition = $data['current_condition'] ?? null;
    }
}
