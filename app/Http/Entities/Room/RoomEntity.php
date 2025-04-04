<?php

namespace App\Http\Entities\Room;

use App\Models\Room\Room;

class RoomEntity
{
    public ?string $id;

    public ?string $name;

    public ?int $house_id;

    public ?string $description;

    public ?RoomDetailEntity $detail;

    public ?array $images;

    public ?array $tags;

    public ?float $price;

    public ?string $status;

    public ?string $created_by;

    public ?string $updated_by;

    public ?string $deleted_by;

    public ?string $created_at;

    public ?string $updated_at;

    public ?string $deleted_at;

    /**
     * Constructor
     */
    public function __construct(Room $room, bool $hasPermission = false)
    {
        $this->id = $room->id ?? null;
        $this->name = $room->name ?? null;
        $this->house_id = $room->house_id ?? null;
        $this->description = $room->description ?? null;
        $this->detail = new RoomDetailEntity((array) $room->detail);
        $this->images = $room->images ?? null;
        $this->tags = $room->tags ?? null;
        $this->price = $room->price ?? null;
        $this->status = $room->status ?? null;
        if ($hasPermission) {
            $this->created_by = $room->created_by ?? null;
            $this->updated_by = $room->updated_by ?? null;
            $this->deleted_by = $room->deleted_by ?? null;
            $this->created_at = $room->created_at ?? null;
            $this->updated_at = $room->updated_at ?? null;
            $this->deleted_at = $room->deleted_at ?? null;
        }
    }
}
