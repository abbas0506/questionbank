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
            // $table->string('user_id', 20);
            $table->string('name', 50);
            $table->string('father', 50);
            $table->string('cnic', 15)->unique();
            $table->string('phone', 16)->nullable();
            $table->string('address', 100)->nullable();
            $table->date('dob')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('can_borrow_books')->default(1);

            $table->string('rollno');
            $table->string('regno', 20)->nullable();
            $table->unsignedBigInteger('clas_id');
            $table->unsignedBigInteger('group_id');

            $table->foreign('clas_id')->references('id')->on('clas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onUpdate('cascade')->onDelete('cascade');

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
