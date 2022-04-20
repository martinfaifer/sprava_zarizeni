<?php

namespace Database\Seeders;

use App\Models\DhcpServer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DhcpServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!DhcpServer::where('ip_address', "93.91.144.206")->first()) {
            DhcpServer::create([
                'description' => "DHCP CV",
                'ip_address' => "93.91.144.206",
                'device_vendor_id' => 1,
                'device_login_id' => 1
            ]);
        }
    }
}
