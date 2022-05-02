<?php

use App\Models\DhcpServer;
use Illuminate\Support\Facades\Artisan;
use App\Actions\Devices\Eloquent\DeviceCreateAction;
use App\Actions\Devices\Comunications\DeviceComunicationAction;
use App\Models\Device;

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

Artisan::command('device:get_sn', function () {
    $devices = Device::get();
    foreach($devices as $device) {
        (new DeviceComunicationAction())->comunicate($device, 'get_sn');
    }
});
