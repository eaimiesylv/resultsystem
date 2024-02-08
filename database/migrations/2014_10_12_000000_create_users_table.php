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
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email_regno', 200);
            $table->string('sex', 4);
            $table->date('dob', 10)->nullable();
            $table->string('status', 10)->default('active');
            $table->string('passport', 100)->nullable();
            $table->string('username', 100)->nullable();
            $table->unSignedBigInteger('class_id')->nullable();
            $table->unSignedBigInteger('session_id')->nullable();
            $table->integer('role')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('ip', 20)->nullable();
            $table->string('hash', 60)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
