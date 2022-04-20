<?php
namespace App\Actions\Devices\Comunications;

use App\Services\Devices\API\ApiService;
use App\Services\Devices\Api\MikroTik\MikroTikApiService;

class DeviceComunicationAction
{
    public function comunicate(object $device, string $query, array $params = [])
    {
        return (new ApiService())->api($device, $query, $params);
    }
}
