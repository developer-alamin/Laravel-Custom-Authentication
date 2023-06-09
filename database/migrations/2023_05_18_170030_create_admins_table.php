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
        Schema::create('admins_table', function (Blueprint $table) {
            $table->id();
            $table->string('admin_name');
            $table->string('admin_mobile');
            $table->string('admin_id');
            $table->string('admin_email');
            $table->string('admin_img');
            $table->string('admin_password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
