<?php

namespace App\Models\User\Definitions;

/**
 * UserConst
 *
 * @package App\Models\User\Definitions
 * @copyright Copyright (c) 2025, jarvis.phongtran
 * @author Phong <jarvis.phongtran@gmail.com>
 */
interface UserConst
{
    public const ROLE_ROOT_CODE = -1;
    public const ROLE_SUPER_ADMIN_CODE = 0;
    public const ROLE_ADMIN_CODE = 1;
    public const ROLE_MANAGER_CODE = 2;
    public const ROLE_EMPLOYEE_CODE = 3;
    public const ROLE_PARTNER_CODE = 4;
    public const ROLE_LESSOR_CODE = 7;
    public const ROLE_LESSOR_PARTNER_CODE = 8;
    public const ROLE_LESSEE_CODE = 10;

    public const ROLE_ROOT = 'root';
    public const ROLE_SUPER_ADMIN = 'super-admin';
    public const ROLE_ADMIN = 'admin';
    public const ROLE_MANAGER = 'manager';
    public const ROLE_EMPLOYEE = 'employee';
    public const ROLE_PARTNER = 'partner';
    public const ROLE_LESSOR = 'lessor';
    public const ROLE_LESSOR_PARTNER = 'lessor-partner';
    public const ROLE_LESSEE = 'lessee';

    public const STATUS_INACTIVE = 0;
    public const STATUS_ACTIVE = 1;
}
