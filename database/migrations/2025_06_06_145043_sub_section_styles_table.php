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
        Schema::create('sub_section_styles', function (Blueprint $table){
            $table->id();
            $table->json('list_dates')->nullable();
            $table->json('list_numbers')->nullable();
            $table->integer('lucky_number')->nullable();
            $table->string('img')->nullable();
            $table->string('color_title')->nullable();
            $table->string('color_sub_title')->nullable();
            $table->string('color_sub_paragraph')->nullable();
            $table->string('font_title')->nullable();
            $table->string('font_sub_title')->nullable();
            $table->string('font_paragraph')->nullable();
            $table->string('color_lucky_number')->nullable();
            $table->string('border_color_lucky_number')->nullable();
            $table->string('color_list_numbers')->nullable();
            $table->string('color_list_dates')->nullable();
            $table->foreignId('sub_section_content_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_section_styles');
    }
};
