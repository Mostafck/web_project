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
        Schema::create('games', function (Blueprint $table) {
         $table->id();
         $table->string('title');
         $table->text('description');
         $table->string('developer')->nullable();
         $table->string('publisher')->nullable();
         $table->date('release_date')->nullable();
         $table->decimal('rating', 3, 1)->default(0); // میانگین امتیاز
         $table->string('cover_image')->nullable();
         $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
