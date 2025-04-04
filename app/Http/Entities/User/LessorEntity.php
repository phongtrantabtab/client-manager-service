<?php

namespace App\Http\Entities\User;

use App\Models\User\User;

class LessorEntity
{
    public ?int $id;

    public ?string $first_name;

    public ?string $last_name;

    public ?string $email;

    public ?string $phone;

    public ?string $avatar;

    /**
     * Constructor
     */
    public function __construct(?User $lessor)
    {
        $this->id = $lessor->id ?? null;
        $this->first_name = $lessor->first_name ?? null;
        $this->last_name = $lessor->last_name ?? null;
        $this->email = $lessor->email ?? null;
        $this->phone = $lessor->phone ?? null;
        $this->avatar = $lessor->avatar ?? null;
    }
}
