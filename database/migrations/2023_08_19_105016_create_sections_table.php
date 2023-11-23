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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->unsignedBigInteger('clas_id');  //
            $table->unsignedBigInteger('incharge_id')->nullable();
            $table->year('induction_year');
            $table->timestamps();

            $table->unique(['clas_id', 'label']); //disallow same section name within a class
            $table->foreign('clas_id')->references('id')->on('clas')->onDelete('cascade');
            $table->foreign('incharge_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
