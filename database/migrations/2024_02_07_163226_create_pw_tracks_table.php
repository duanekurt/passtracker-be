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
        Schema::create('pw_tracks', function (Blueprint $table) {
            $table->id();
            $table->string('password_for');
            $table->string('email_username');
            $table->string('slug'); // to decrypt
            // $table->string('unhashed_password')->nullable();
            $table->string('hashed_password');
            $table->unsignedBigInteger('account_type_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('account_type_id')->references('id')->on('account_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pw_tracks');
    }
};
