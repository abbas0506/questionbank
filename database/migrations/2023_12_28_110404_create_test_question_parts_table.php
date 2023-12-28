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
        Schema::create('test_question_parts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_question_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedTinyInteger('marks');

            $table->timestamps();
            $table->foreign('test_question_id')->references('id')->on('test_questions')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_question_parts');
    }
};
