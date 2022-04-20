<?php

namespace Database\Seeders;

use App\Models\DeviceLogin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!DeviceLogin::where([['username', 'admin'], ['password', 'admin']])->first()) {
            DeviceLogin::create([
                'username' => "admin",
                'password' => "admin"
            ]);
        }
    }
}
