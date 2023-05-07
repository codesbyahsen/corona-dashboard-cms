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
        Schema::create('mail_configurations', function (Blueprint $table) {
            $table->id();
            $table->string('transport')->nullable();
            $table->string('host')->nullable();
            $table->string('port')->nullable();
            $table->string('encryption')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('from_address')->nullable();
            $table->string('from_name')->nullable();
            $table->boolean('is_active')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mail_configurations');
    }
};
