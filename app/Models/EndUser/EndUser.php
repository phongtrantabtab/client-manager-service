<?php

namespace App\Models\EndUser;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EndUser extends Model
{
    use Authenticatable, HasFactory, SoftDeletes;

    protected $connection = 'auth_db';
    protected $table = 'users';
    protected $guarded = ['id'];
    protected $fillable = [
        'status',
        'config_id',
        'group_account_config_id',
        'role',
        'active_zone',
        'language',
        'created_by',
        'updated_by',
        'deleted_by',
        'avatar',
        'cover_photo',
        'is_verify_otp',
        'phone_number',
        'country_code',
        'locale_code',
        'confirmation_code',
        'confirmation_code_expired_at',
        'slug',
        'uuid',
        'alias',
        'anonymous_user_id',
        'description',
        'refer_code',
        'first_name',
        'last_name',
        'state',
        'password',
        'gender',
        'birthday',
        'card_id',
        'origin_address',
        'address',
        'doe',
        'user_message_id'

    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */
    protected $hidden = [
        'password',
        'card_id'
    ];
}
