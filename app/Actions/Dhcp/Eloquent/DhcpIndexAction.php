<?php

namespace App\Actions\Dhcp\Eloquent;

use App\Models\DhcpServer;

class DhcpIndexAction
{
    public function index()
    {
        return DhcpServer::get(['id', 'description', 'ip_address']);
    }
}
