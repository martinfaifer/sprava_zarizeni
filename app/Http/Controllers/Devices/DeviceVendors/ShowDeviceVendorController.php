<?php

namespace App\Http\Controllers\Devices\DeviceVendors;

use App\Models\DeviceVendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\DeviceVendors\Eloquent\DeviceVendorShowDevicesAction;

class ShowDeviceVendorController extends Controller
{
    public function __invoke(DeviceVendor $deviceVendor, DeviceVendorShowDevicesAction $deviceVendorShowDevicesAction)
    {
        return $deviceVendorShowDevicesAction->show($deviceVendor);
    }
}
