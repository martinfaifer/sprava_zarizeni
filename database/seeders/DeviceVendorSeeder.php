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
        if (!DeviceVendor::where('vendor', "MikroTik")->first()) {
            DeviceVendor::create([
                'vendor' => "MikroTik",
                'has_api' => true
            ]);
        }
    }
}
