<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceVendor extends Model
{
    protected $fillable = [
        'vendor',
        'has_api'
    ];

    protected $casts = [
        'has_api' => 'boolean',
    ];

    public function macs()
    {
        return $this->hasMany(MacVendor::class, 'device_vendor_id', 'id');
    }

    public function devices()
    {
        return $this->hasMany(Device::class, 'device_vendor_id', 'id')->select(['id', 'description', 'ip_address', 'mac_address']);
    }
}
