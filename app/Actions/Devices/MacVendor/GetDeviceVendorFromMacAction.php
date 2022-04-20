<?php

namespace App\Actions\Devices\MacVendor;

use App\Models\DeviceVendor;
use App\Models\MacVendor;
use App\Services\Vendors\API\MacVendorApiService;

class GetDeviceVendorFromMacAction
{

    public function get_vendor_and_store_if_dont_exist(string $mac, $output)
    {
        $apiResponse =  (new MacVendorApiService())->get_response($mac, $output);
        print_r($apiResponse);
        if (is_array($apiResponse)) {
            $this->store($apiResponse);
        }
    }

    public function store(array $apiResponse)
    {
        if (array_key_exists('company', $apiResponse['result'])) {

            $vendor = DeviceVendor::where('vendor', $apiResponse['result']['company'])->first();
            if (!$vendor)
                $vendor = DeviceVendor::create([
                    'vendor' => $apiResponse['result']['company']
                ]);

            try {
                MacVendor::create([
                    'mac_prefix' => $apiResponse['result']['mac_prefix'],
                    'device_vendor_id' => $vendor->id
                ]);
            } catch (\Throwable $th) {
            }
        }
    }
}
