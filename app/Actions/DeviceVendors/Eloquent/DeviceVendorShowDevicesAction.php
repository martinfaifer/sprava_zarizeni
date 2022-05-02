<?php

namespace App\Actions\DeviceVendors\Eloquent;

use Illuminate\Database\Eloquent\Collection;

class DeviceVendorShowDevicesAction
{
    public function show(object $deviceVendor)
    {
        return $deviceVendor->devices;
    }
}
