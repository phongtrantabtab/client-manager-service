<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authentication;
use App\Enum\General;
use App\Models\Address\Ward;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Models\User\Definitions\UserDefs;
use Carbon\Carbon;

class User extends Authentication
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'ward',
        'district',
        'province',
    ];

    public function ward(): Attribute
    {
        $ward = Ward::where('code', $this->ward_code)->first();

        return Attribute::make(
            get: fn () => $ward ? $ward->name : null
        );
    }

    public function district(): Attribute
    {
        $district = District::where('code', $this->district_code)->first();

        return Attribute::make(
            get: fn () => $district ? $district->name : null
        );
    }

    public function province(): Attribute
    {
        $province = Province::where('code', $this->province_code)->first();

        return Attribute::make(
            get: fn () => $province ? $province->name : null
        );
    }

    /**
     * Get Status Attribute
     */
    public function getStatusAttribute($value): ?string
    {
        return __('label.common.status.'.UserDefs::getStatusByCode($value));
    }

    /**
     * Get Created At Attribute
     */
    public function getCreatedAtAttribute(string $date): string
    {
        return Carbon::parse($date)->format(General::DATE_TIME_FORMAT);
    }

    /**
     * Get Updated At Attribute
     */
    public function getUpdatedAtAttribute(string $date): string
    {
        return Carbon::parse($date)->format(General::DATE_TIME_FORMAT);
    }
}
