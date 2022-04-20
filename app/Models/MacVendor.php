<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MacVendor extends Model
{
    protected $fillable = [
        'mac_prefix', 'device_vendor_id'
    ];

    public function vendor()
    {
        return $this->belongsTo(DeviceVendor::class, 'device_vendor_id', 'id');
    }
}
