<?php

namespace App\Actions\Devices\Eloquent;

use App\Models\Device;

class DeviceCreateAction
{
    public static function create(string $description, string $ip_address, string $mac_address, int $device_vendor_id, $device_login_id = null)
    {
        try {
            Device::create([
                'description' => $description,
                'ip_address' => $ip_address,
                'mac_address' => $mac_address,
                'device_vendor_id' => $device_vendor_id,
                'device_login_id' => $device_login_id,
                'status' => false
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
