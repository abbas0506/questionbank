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
            $table->string('name', 100);
            $table->string('father', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('address', 150)->nullable();
            $table->string('matric_rollno', 20)->unique();
            $table->unsignedSmallInteger('matric_marks');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('session_id');
            $table->boolean('is_other_board')->default(false);
            $table->string('objection', 200)->nullable();
            $table->unsignedSmallInteger('fee')->nullable();
            $table->timestamps();

            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
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
