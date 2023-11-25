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
        Schema::create('clas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grade_id');  //
            $table->string('section_label', 20);
            $table->year('induction_year');
            $table->unsignedBigInteger('incharge_id')->nullable();
            $table->timestamps();

            $table->unique(['grade_id', 'section_label']); //disallow same section name within a class
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('incharge_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clas');
    }
};
