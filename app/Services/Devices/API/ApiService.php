<?php
namespace App\Services\Devices\API;

use App\Services\Devices\API\MikroTik\MikroTikApiDataService;

class ApiService
{
    public function api(object $device, string $query, array $params)
    {
        return match($device->vendor->vendor) {
            'MikroTik' => (new MikroTikApiDataService())->fetch_data($device, $query, $params),
            'Routerboard.com' => (new MikroTikApiDataService())->fetch_data($device, $query, $params),
        };
    }
}
