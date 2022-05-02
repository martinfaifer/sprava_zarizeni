<?php

namespace App\Services\Devices\API\MikroTik\Queries;

class MikrotikApiGetWirelessInterfaces
{
    public static function get(object $connect, $params)
    {
        $output = [];

        if (empty($params)) {
            $items = $connect->query(
                '/interface/wireless/print',
                $params
            )->read();

            return $items;
        }

        return $output;
    }
}
