<?php

namespace App\Http\Entities\House;

use App\Http\Entities\Address\AddressEntity;
use App\Http\Entities\Category\CategoryEntity;
use App\Http\Entities\User\LessorEntity;
use App\Models\House\House;

class HouseEntity
{
    public ?int $id;

    public ?string $name;

    public ?LessorEntity $lessor;

    public ?string $full_name;

    public ?string $description;

    public ?string $thumbnail;

    public ?CategoryEntity $category;

    public ?AddressEntity $address;

    public ?string $verified_at;

    public ?int $status;

    public ?string $status_label;

    public ?int $created_by;

    public ?int $updated_by;

    public ?int $deleted_by;

    public ?string $created_at;

    public ?string $updated_at;

    public ?string $deleted_at;

    /**
     * Constructor
     */
    public function __construct(House $house, bool $hasPermission = false)
    {
        $this->id = $house->id ?? null;
        $this->name = $house->name ?? null;
        $this->lessor = new LessorEntity($house->lessor ?? null);
        $this->full_name = $house->full_name ?? null;
        $this->description = $house->description ?? null;
        $this->thumbnail = $house->thumbnail ?? null;
        $this->category = new CategoryEntity($house->category ?? null);
        $this->address = new AddressEntity($house->address ?? [], $house->full_address ?? null);
        $this->verified_at = $house->verified_at ?? null;
        $this->status = $house->status ?? null;
        $this->status_label = $house->status_label ?? null;
        if ($hasPermission) {
            $this->created_by = $house->created_by ?? null;
            $this->updated_by = $house->updated_by ?? null;
            $this->deleted_by = $house->deleted_by ?? null;
            $this->created_at = $house->created_at ?? null;
            $this->updated_at = $house->updated_at ?? null;
            $this->deleted_at = $house->deleted_at ?? null;
        }
    }
}
