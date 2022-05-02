<?php

namespace App\Http\Controllers\Devices;

use App\Actions\Dhcp\Eloquent\DhcpIndexAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DhcpServerController extends Controller
{
    public function index(DhcpIndexAction $dhcpIndexAction)
    {
        return $dhcpIndexAction->index();
    }
}
