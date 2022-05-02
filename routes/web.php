<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Devices\DeviceController;
use App\Http\Controllers\Devices\DhcpServerController;
use App\Http\Controllers\Devices\DeviceVendors\ShowDeviceVendorController;
use App\Http\Controllers\Devices\ShowDeviceController;

Route::view('/', 'welcome');

Route::post('login', [AuthController::class, 'login']);

// Route::get('dhcp/{dhcpServer}/{query}', [DhcpComunicateController::class, 'show']);
Route::prefix('devices')->group(function () {

    Route::prefix('devices')->group(function() {
        Route::get('/', [DeviceController::class, 'index']);
        Route::get('vendors/{deviceVendor}' , ShowDeviceVendorController::class);
        Route::get('{device}/{query?}', ShowDeviceController::class );
    });

    Route::prefix('dhcps')->group(function () {
        Route::get('/', [DhcpServerController::class, 'index']);
    });
});
