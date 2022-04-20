<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhcp_servers', function (Blueprint $table) {
            $table->id();
            $table->string('description')->index()->unique();
            $table->ipAddress('ip_address')->unique()->index();
            $table->foreignId('device_vendor_id')->index();
            $table->foreignId('device_login_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dhcp_servers');
    }
};
