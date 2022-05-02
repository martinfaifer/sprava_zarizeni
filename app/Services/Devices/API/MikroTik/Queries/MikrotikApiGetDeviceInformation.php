<?php

namespace App\Services\Devices\API\MikroTik\Queries;

class MikrotikApiGetDeviceInformation
{
    public static function get(object $connect, $params)
    {
        $output = [];

        if (empty($params)) {
            $items = $connect->query(
                '/interface/print',
                $params
            )->read();

            return $items;
        }

        return $output;
    }
}
