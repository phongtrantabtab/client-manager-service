<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class Json implements CastsAttributes
{
    /**
     * Convert values from database to PHP array when retrieved.
     * @param $model
     * @param string $key
     * @param $value
     * @param array $attributes
     * @return mixed|null
     */
    public function get($model, string $key, $value, array $attributes): mixed
    {
        return json_decode($value, true);
    }

    /**
     * Convert values from PHP array to JSON when saving to database.
     * @param $model
     * @param string $key
     * @param $value
     * @param array $attributes
     * @return false|string
     */
    public function set($model, string $key, $value, array $attributes): false|string
    {
        if (!is_array($value) && !is_object($value)) {
            throw new InvalidArgumentException('The given value is not an array or object.');
        }

        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
