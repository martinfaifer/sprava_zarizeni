<?php

namespace App\Services\Devices\Api\MikroTik;

use RouterOS\Client;

class MikroTikApiConnectService
{
    protected $timeout = 2;
    protected $attempts = 1;
    protected $port = 8728;

    /**
     * connect to device
     *
     * @return boolean|object
     */
    public function connect(object $device): mixed
    {
        try {
            $client = new Client([
                'host' => $device->ip_address,
                'user' => $device->login->username,
                'pass' => $device->login->password,
                'port' => $this->port,
                // 'timeout' => $this->timeout,
                // 'attempts' => $this->attempts
            ]);
            return $client;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
