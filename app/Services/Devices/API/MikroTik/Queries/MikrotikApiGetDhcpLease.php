<?php
namespace App\Services\Devices\API\MikroTik\Queries;

use App\Models\MacVendor;

class MikrotikApiGetDhcpLease
{
    public static function get(object $connect, $params)
    {
        $output = [];

        $items = $connect->query(
            '/ip/dhcp-server/lease/print',
            $params
        )->read();

        if(empty($items)) {
            return $output;
        }

        foreach ($items as $item) {
            $macVendor = MacVendor::where('mac_prefix', substr($item['mac-address'], 0 , 8))->first();
            $output[] = [
                'id' => $item['.id'],
                'address' => $item['address'],
                'mac-address' => $item['mac-address'],
                'comment' => self::check_is_key_comment($item),
                'vendor_id' => !$macVendor ? 0 : $macVendor->device_vendor_id,
                'device_login_id' => null
            ];
        }

        return $output;
    }

    private static function check_is_key_comment(array $item)
    {
        if(array_key_exists('comment', $item)) {
            return mb_convert_encoding($item['comment'], 'UTF-8', 'UTF-8');
        }
        return "";
    }
}
