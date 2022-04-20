<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceLogin extends Model
{
    protected $fillable = [
        'username',
        'password'
    ];
}
