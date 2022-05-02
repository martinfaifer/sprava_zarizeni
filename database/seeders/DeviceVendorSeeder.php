<?php

namespace Database\Seeders;

use App\Models\DeviceVendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceVendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!DeviceVendor::where('vendor', "Routerboard.com")->first()) {
            DeviceVendor::create([
                'vendor' => "Routerboard.com",
                'has_api' => true
            ]);
        }
    }
}
