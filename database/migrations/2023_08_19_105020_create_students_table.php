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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('father', 50)->nullable();
            $table->string('cnic', 15)->nullable()->unique();
            $table->string('phone', 16)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('image', 20)->default('default.png');
            $table->date('dob')->nullable();
            $table->enum('gender', ['M', 'F', 'T'])->default('M');
            $table->string('regno', 20)->unique()->nullable();

            $table->unsignedInteger('score');

            $table->unsignedBigInteger('section_id');
            $table->string('rollno');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('status_id')->default(1);

            $table->foreign('section_id')->references('id')->on('sections')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
