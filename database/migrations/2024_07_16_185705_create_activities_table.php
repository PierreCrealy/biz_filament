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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('place');
            $table->dateTime('begin');
            $table->dateTime('ending');
            $table->integer('min_user');
            $table->integer('max_user');

            $table->foreignId('user_id')->constrained();
            $table->foreignId('level_id')->constrained()->references('id')->on('level_activities');
            $table->foreignId('type_id')->constrained()->references('id')->on('type_activities');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
