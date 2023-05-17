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
            $table->string('logo')->comment('company info')->nullable();
            $table->string('favicon')->comment('company info')->nullable();
            $table->string('name')->comment('company info')->nullable();
            $table->string('tagline')->comment('company info')->nullable();
            $table->string('phone', 20)->comment('company info')->nullable();
            $table->string('mobile', 20)->comment('company info')->nullable();
            $table->string('email')->comment('company info')->nullable();
            $table->string('street_address')->comment('company info')->nullable();
            $table->string('city')->comment('company info')->nullable();
            $table->string('state')->comment('company info')->nullable();
            $table->string('country')->comment('company info')->nullable();
            $table->string('latitude')->comment('company info')->nullable();
            $table->string('longitude')->comment('company info')->nullable();
            $table->string('timezone')->comment('company setting')->nullable();
            $table->string('primary_color')->comment('company setting')->nullable();
            $table->string('secondary_color')->comment('company setting')->nullable();
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
