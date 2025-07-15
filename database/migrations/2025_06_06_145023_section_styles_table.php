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
        Schema::create('section_styles', function(Blueprint $table){
            $table->id();
            $table->string('color_background')->nullable();
            $table->string('color_title')->nullable();
            $table->string('img_background')->nullable();
            $table->string('font_title')->nullable();
            $table->string('img_section')->nullable();
            $table->foreignId('section_content_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_styles');
    }
};
