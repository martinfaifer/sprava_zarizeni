<?php

namespace App\Services\Vendors\API;

use Illuminate\Support\Facades\Http;

class MacVendorApiService
{
    protected $url = "http://macvendors.co/api";

    public function get_response(string $mac, string $output = "json")
    {
        try {
            return Http::get($this->url . "/" . $mac . "/" . $output)->json();
        } catch (\Throwable $th) {
            return null;
        }
    }
}
