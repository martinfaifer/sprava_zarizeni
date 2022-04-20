<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DhcpServer extends Model
{
    protected $fillable = [
        'description',
        'ip_address',
        'device_vendor_id',
        'device_login_id'
    ];


    public function vendor()
    {
        return $this->belongsTo(DeviceVendor::class, 'device_vendor_id', 'id');
    }

    public function login()
    {
        return $this->belongsTo(DeviceLogin::class, 'device_login_id', 'id');
    }
}
