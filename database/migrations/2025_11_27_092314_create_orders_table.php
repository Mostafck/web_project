<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('orders', function (Blueprint $table) {
    $table->id();

    $table->unsignedBigInteger('user_id');
    $table->unsignedBigInteger('game_id');

    $table->string('game_title');
    $table->integer('price');

    $table->enum('status', ['pending', 'completed', 'canceled'])
          ->default('pending');

    $table->boolean('is_paid')->default(false);

    $table->timestamp('paid_at')->nullable();
    $table->timestamp('completed_at')->nullable();

    $table->timestamps();
});

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
