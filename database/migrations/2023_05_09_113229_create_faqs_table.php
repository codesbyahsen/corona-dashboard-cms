<?php

use App\Models\Faq;
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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('faq_category_id')->nullable();
            $table->string('question', 800)->nullable();
            $table->text('answer')->nullable();
            $table->boolean('is_active')->default(Faq::STATUS_INACTIVE)->nullable();
            $table->timestamps();
        });

        Schema::table('faqs', function ($table) {
            $table->foreign('faq_category_id')->references('id')->on('faq_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
