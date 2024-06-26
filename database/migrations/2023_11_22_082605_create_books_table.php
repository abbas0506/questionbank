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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('author', 50)->nullable();
            $table->unsignedSmallInteger('publish_year')->nullable();
            $table->unsignedSmallInteger('num_of_copies')->default(1);
            $table->unsignedSmallInteger('price');

            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('book_domain_id');
            $table->unsignedBigInteger('book_rack_id');
            $table->unsignedBigInteger('assistant_id')->nullable();

            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('book_domain_id')->references('id')->on('book_domains')->onDelete('cascade');
            $table->foreign('book_rack_id')->references('id')->on('book_racks')->onDelete('cascade');
            $table->foreign('assistant_id')->references('id')->on('assistants')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
