<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ward extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'wards';

    /**
     * District
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(
            District::class,
            'district_code',
            'code'
        );
    }

    /**
     * Unit
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(
            AdministrativeUnit::class,
            'administrative_unit_id'
        );
    }
}
