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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('lastname');
            $table->string('name');
            $table->date('date_birth');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('tel')->unique();

            $table->string('password');

            // $table->foreignId('status_id')->constrained();
            // $table->foreignId('role_id')->constrained();
            // $table->foreignId('type_id')->constrained();

            $table->foreignId('status_id')->constrained()->references('id')->on('status_users');
            $table->foreignId('role_id')->constrained()->references('id')->on('role_users');
            $table->foreignId('type_id')->constrained()->references('id')->on('type_users');

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
    }
};