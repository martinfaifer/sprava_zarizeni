<?php

namespace App\Http\Controllers\Devices;

use App\Actions\Devices\Comunications\DeviceComunicationAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DhcpServer;

class DhcpComunicateController extends Controller
{
    public function show(DhcpServer $dhcpServer, string $query, DeviceComunicationAction $deviceComunicationAction)
    {
        return $deviceComunicationAction->comunicate($dhcpServer, $query);
    }
}
