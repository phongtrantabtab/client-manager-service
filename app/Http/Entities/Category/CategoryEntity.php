<?php

namespace App\Http\Entities\Category;

use App\Models\Category\Category;

class CategoryEntity
{
    public ?int $id;

    public ?string $name_vi;

    public ?string $name_en;

    public ?string $description_vi;

    public ?string $description_en;

    public ?string $icon;

    public ?string $status;

    /**
     * Constructor
     */
    public function __construct(?Category $category, bool $isFull = false)
    {
        $this->id = $category->id ?? null;
        $this->name_vi = $category->name_vi ?? null;
        $this->name_en = $category->name_en ?? null;
        $this->description_vi = $category->description_vi ?? null;
        $this->description_en = $category->description_en ?? null;
        if ($isFull) {
            $this->icon = $category->icon ?? null;
        }
    }
}
