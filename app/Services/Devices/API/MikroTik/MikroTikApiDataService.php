<?php

namespace App\Services\Devices\API\MikroTik;

use App\Models\MacVendor;
use App\Services\Devices\Api\MikroTik\MikroTikApiConnectService;
use App\Services\Devices\API\MikroTik\Queries\MikrotikApiGetDhcpLease;

class MikroTikApiDataService extends MikroTikApiConnectService
{
    public function fetch_data(object $device, string $query, array $params = [])
    {
        $connect = $this->connect($device);
        if ($connect == false) {
            return "Nelze se připojit";
        }

        return match ($query) {
            'get_dhcp_leases' => MikrotikApiGetDhcpLease::get($connect, $params)
        };
    }

}
