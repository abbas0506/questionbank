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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('father', 50);
            $table->string('phone', 16)->nullable();
            $table->string('address', 100)->nullable();
            $table->year('year');
            $table->string('previous_rollno', 8)->unique();
            $table->unsignedSmallInteger('previous_marks');
            $table->string('previous_board', 20)->nullable();
            $table->enum('previous_medium', ['English', 'Urdu'])->default('Urdu'); //english:0, urdu:1
            $table->string('objection', 200)->nullable();
            $table->unsignedSmallInteger('fee')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('clas_id');
            $table->unsignedBigInteger('group_id');

            $table->foreign('clas_id')->references('id')->on('clas')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
