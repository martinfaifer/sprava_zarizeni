<?php

namespace App\Actions\Devices\Eloquent;

use App\Models\Device;

class DeviceIndexAction
{
    public function index($paginate = false , $numberOfItems  = 20)
    {
        if ($paginate == true) {
            return Device::paginate($numberOfItems);
        }

        return Device::get();
    }
}
