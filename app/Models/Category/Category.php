<?php

namespace App\Models\Category;

use App\Models\BaseModel;

class Category extends BaseModel
{
    /**
     * @var array
     */
    protected $fillable = [
        'name_vi',
        'name_en',
        'description_vi',
        'description_en',
        'icon',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
