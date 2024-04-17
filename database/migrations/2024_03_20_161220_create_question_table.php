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
        Schema::create('question', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('question');
            $table->string('option_A');
            $table->integer('option_A_votes')->default(0);
            $table->string('option_B');
            $table->integer('option_B_votes')->default(0);
            $table->string('option_C')->nullable();
            $table->integer('option_C_votes')->default(0);
            $table->string('option_D')->nullable();
            $table->integer('option_D_votes')->default(0);
            $table->json('voted_users')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question');
    }
};
