<?php

namespace App\Models\Room\Definitions;

/**
 * RoomConstantTrait
 *
 * @package App\Models\Room\Definitions
 * @copyright Copyright (c) 2025, jarvis.phongtran
 * @author Phong <jarvis.phongtran@gmail.com>
 */
trait RoomConstantTrait
{
    /**
     * @var array|string[] $status
     */
    private static array $status = [
        self::STATUS_INACTIVE_CODE => self::STATUS_INACTIVE,
        self::STATUS_DRAFT_CODE    => self::STATUS_DRAFT,
        self::STATUS_PENDING_CODE  => self::STATUS_PENDING,
        self::STATUS_APPROVED_CODE => self::STATUS_APPROVED,
    ];

    /**
     * Get status by code
     *
     * @param $code
     * @return string
     */
    public static function getStatusByCode($code): string
    {
        return self::$status[$code] ?? '';
    }

    /**
     * Get status by key
     *
     * @param $key
     * @return string
     */
    public static function getStatusByKey($key): string
    {
        return array_flip(self::$status)[$key] ?? '';
    }
}
