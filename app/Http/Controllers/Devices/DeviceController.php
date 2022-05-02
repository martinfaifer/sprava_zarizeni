<?php

namespace App\Http\Controllers\Devices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Devices\Eloquent\DeviceIndexAction;

class DeviceController extends Controller
{
    public function index(DeviceIndexAction $deviceIndexAction)
    {
        return $deviceIndexAction->index(true, 200 );
    }
}
