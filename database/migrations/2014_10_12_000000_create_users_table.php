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
            $table->uuid('id',32)->primary();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('regno', 200)->unique();
            $table->string('email', 150)->nullable();
            $table->string('sex', 4);
            $table->date('dob', 10)->nullable();
            $table->string('password');
            $table->string('passport', 100)->nullable();
            $table->string('status', 10)->default('active');
            $table->integer('role')->default(0);
            $table->string('ip', 20)->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
