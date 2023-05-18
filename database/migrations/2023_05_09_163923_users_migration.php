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
        Schema::create('users_table', function (Blueprint $table) {
            $table->id();
            $table->string('users_name');
            $table->string('users_father');
            $table->string('users_mother');
            $table->string('users_phone');
            $table->string('users_email');
            $table->string('users_email_verified_at')->nullable();
            $table->string('users_password');
            $table->string('users_img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
