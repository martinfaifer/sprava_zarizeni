<?php

namespace App\Http\Controllers\Devices;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Devices\Comunications\DeviceComunicationAction;

class ShowDeviceController extends Controller
{
    public function __invoke(Device $device, $query = null)
    {
        if(is_null($query)) {
            $query = "get_device_info";
        }

        return (new DeviceComunicationAction())->comunicate($device, $query);
    }
}
