<?php

use App\Models\DhcpServer;
use Illuminate\Support\Facades\Artisan;
use App\Actions\Devices\Eloquent\DeviceCreateAction;
use App\Actions\Devices\Comunications\DeviceComunicationAction;


Artisan::command('dhcp:store', function () {
    $dhcpServers = DhcpServer::get();
    foreach ($dhcpServers as $dhcpServer) {
        $leases = (new DeviceComunicationAction())->comunicate($dhcpServer, 'get_dhcp_leases');
        if (!empty($leases)) {
            foreach ($leases as $lease) {
                DeviceCreateAction::create(
                    $lease['comment'],
                    $lease['address'],
                    $lease['mac-address'],
                    $lease['vendor_id'],
                );
            }
        }
    }
});
