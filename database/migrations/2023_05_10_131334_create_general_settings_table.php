<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->comment('company logo')->nullable();
            $table->string('favicon')->comment('company favicon')->nullable();
            $table->string('name')->comment('company name')->nullable();
            $table->string('tagline')->comment('company tagline')->nullable();
            $table->string('phone', 20)->comment('company phone number')->nullable();
            $table->string('mobile', 20)->comment('company mobile number')->nullable();
            $table->string('email')->comment('company email')->nullable();
            $table->string('street_address')->comment('company address')->nullable();
            $table->string('city')->comment('company address')->nullable();
            $table->string('state')->comment('company address')->nullable();
            $table->string('country')->comment('company address')->nullable();
            $table->string('latitude')->comment('company address')->nullable();
            $table->string('longitude')->comment('company address')->nullable();
            $table->string('timezone')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
