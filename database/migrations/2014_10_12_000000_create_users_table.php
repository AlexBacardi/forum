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
            $table->string('name');
            $table->unsignedSmallInteger('age')->nullable();
            $table->string('avatar')->nullable();
            $table->string('gender')->nullable();
            $table->string('city')->nullable();
            $table->text('info')->nullable();
            $table->string('web_site')->nullable();
            $table->string('email')->unique();
            $table->unsignedSmallInteger('role')->default(0);
            $table->timestamp('banned_until')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
