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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('description')->index();
            $table->ipAddress('ip_address')->index()->unique();
            $table->string('mac_address')->index()->unique();
            $table->foreignId('device_vendor_id')->index();
            $table->foreignId('device_login_id')->index()->nullable();
            $table->boolean('status')->default(false)->index();
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
        Schema::dropIfExists('devices');
    }
};
