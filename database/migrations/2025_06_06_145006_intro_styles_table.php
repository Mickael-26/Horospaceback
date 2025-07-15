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
        Schema::create('intro_styles', function (Blueprint $table) {
            $table->id();
            $table->string('color_title')->nullable();
            $table->string('color_year')->nullable();
            $table->string('color_small_text')->nullable();
            $table->string('color_background_nav')->nullable();
            $table->string('color_background_intro')->nullable();
            $table->string('font_title')->nullable();
            $table->string('font_small_text')->nullable();
            $table->string('font_year')->nullable();
            $table->string('img_background_mobile_intro')->nullable();
            $table->string('img_nav')->nullable();
            $table->string('img_background_intro')->nullable();
            $table->foreignId('intro_content_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intro_styles');
    }
};
