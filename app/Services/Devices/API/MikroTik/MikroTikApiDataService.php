<?php

namespace App\Services\Devices\API\MikroTik;

use App\Models\MacVendor;
use App\Services\Devices\Api\MikroTik\MikroTikApiConnectService;
use App\Services\Devices\API\MikroTik\Queries\MikrotikApiGetDhcpLease;
use App\Services\Devices\API\MikroTik\Queries\MikrotikApiGetDeviceInformation;
use App\Services\Devices\API\MikroTik\Queries\MikrotikApiGetSn;
use App\Services\Devices\API\MikroTik\Queries\MikrotikApiGetWirelessInterfaces;

class MikroTikApiDataService extends MikroTikApiConnectService
{
    public function fetch_data(object $device, string $query, array $params = [])
    {
        $connect = $this->connect($device);
        if ($connect == false) {
            return [
                'status' => "error",
                'msg' => "Nelze se připojit"
            ];
        }

        return match ($query) {
            'get_device_info' => MikrotikApiGetDeviceInformation::get($connect, $params),
            'get_dhcp_leases' => MikrotikApiGetDhcpLease::get($connect, $params),
            'get_wireless' => MikrotikApiGetWirelessInterfaces::get($connect, $params),
            'get_sn' => MikrotikApiGetSn::get($connect, $params),
        };
    }
}
