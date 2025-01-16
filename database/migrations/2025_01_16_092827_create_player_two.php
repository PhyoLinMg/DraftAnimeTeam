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
        Schema::create('player_two', function (Blueprint $table) {
            $table->id();
            $table->foreignId('battle_id');
            $table->foreignId('role1')->nullable();
            $table->foreignId('role2')->nullable();
            $table->foreignId('role3')->nullable();
            $table->foreignId('role4')->nullable();
            $table->foreignId('role5')->nullable();
            $table->foreignId('role6')->nullable();
            $table->boolean('skip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_two');
    }
};
