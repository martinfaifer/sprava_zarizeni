<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'description',
        'ip_address',
        'mac_address',
        'device_vendor_id',
        'device_login_id',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function vendor()
    {
        return $this->belongsTo(DeviceVendor::class, 'device_vendor_id', 'id');
    }

    public function login()
    {
        return $this->belongsTo(DeviceLogin::class, 'device_vendor_id', 'id');
    }
}
