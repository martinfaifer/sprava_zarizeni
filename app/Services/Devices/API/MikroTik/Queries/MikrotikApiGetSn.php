<?php

namespace App\Services\Devices\API\MikroTik\Queries;

class MikrotikApiGetSn
{
    public static function get(object $connect, $params)
    {
        $output = [];

        if (empty($params)) {
            $items = $connect->query(
                '/system/routerboard/print'
            )->read();

            return $items;
        }

        return $output;
    }
}
