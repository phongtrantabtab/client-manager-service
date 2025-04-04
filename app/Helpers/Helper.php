<?php

namespace App\Helpers;

use Carbon\Carbon;

/**
 * App\Helpers
 *
 * @package App\Helpers\Helper
 * @copyright Copyright (c) 2025, jarvis.phongtran
 * @author Phong <jarvis.phongtran@gmail.com>
 */
class Helper
{
    /**
     * Check valid date time
     */
    public static function validDate(?string $date): ?string
    {
        try {
            if ($date) {
                return Carbon::parse($date);
            }

            return null;
        } catch (\Exception $exception) {
            return Carbon::parse('2000-01-01')
                ->format('Y-m-d H:i:s');
        }
    }
}
