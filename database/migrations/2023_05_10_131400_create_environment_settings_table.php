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
        Schema::create('environment_settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->nullable();
            $table->boolean('app_debug')->nullable()->default(false);
            $table->string('app_mode', 20)->nullable();
            $table->string('app_url')->nullable();
            $table->string('db_connection', 20)->nullable();
            $table->string('db_host')->nullable();
            $table->string('db_port', 10)->nullable();
            $table->string('db_database')->nullable();
            $table->string('db_username')->nullable();
            $table->string('db_password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('environment_settings');
    }
};
