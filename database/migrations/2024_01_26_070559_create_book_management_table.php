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
        Schema::create('book_management', function (Blueprint $table) {
            $table->id();
            $table->integer('isbn');
            $table->string('publisher');
            $table->integer('numPage');
            $table->string('genre');
            $table->string('author');
            $table->string('img');
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_management');
    }
};
