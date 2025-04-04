<?php

namespace App\Core\Database;

use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Performs settings for debugging executed queries.
 */
class QueryDebugger
{
    /**
     * Set up the debugger
     */
    public static function setup(): void
    {
        DB::listen(function ($sql) {
            $tableIgnored = [
                '`sessions`',
            ];
            // Extract the table name (this is a basic approach and might need adjustment based on query structure)
            $table = '';
            if (
                preg_match('/from\s+([^\s]+)/i', $sql->sql, $matches)
                || preg_match('/update\s+([^\s]+)/i', $sql->sql, $matches)
                || preg_match('/into\s+([^\s]+)/i', $sql->sql, $matches)
            ) {
                $table = $matches[1];
            }
            if (! in_array($table, $tableIgnored)) {
                foreach ($sql->bindings as $index => $binding) {
                    if ($binding instanceof DateTime) {
                        $sql->bindings[$index] = $binding->format('\'Y-m-d H:i:s\'');
                    } else {
                        if (is_string($binding)) {
                            $sql->bindings[$index] = "'$binding'";
                        }
                    }
                }

                $query = str_replace(['%', '?'], ['%%', '%s'], $sql->sql);
                $query = vsprintf($query, $sql->bindings);
                $query = "[ExecutionTime: {$sql->time}ms] {$query}";
                Log::channel('sql')->info($query);
            }
        });
    }
}
