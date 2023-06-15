<?php

namespace App\Helpers;


if (!function_exists('auto_nomor')) {
    function auto_nomor(string $table, string $column)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($table);
        $lastRow = $builder->selectMax($column)->get()->getRow();
        $lastId = $lastRow ? $lastRow->$column : 0;
        return $lastId + 1;
    }
}

if (!function_exists('auto_kuid')) {
    function auto_kuid()
    {
        if (function_exists('com_create_guid')) {
            return trim(com_create_guid(), '{}');
        } else {
            mt_srand((float) microtime() * 10000);
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45); // "-"
            $uuid = chr(123) // "{"
                . substr($charid, 0, 8) . $hyphen
                . substr($charid, 8, 4) . $hyphen
                . substr($charid, 12, 4) . $hyphen
                . substr($charid, 16, 4) . $hyphen
                . substr($charid, 20, 12)
                . chr(125); // "}"
            return $uuid;
        }
    }
}
