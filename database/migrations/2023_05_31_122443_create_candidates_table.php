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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            
            // $table->date('date_of_birth')->nullable();
            // $table->string('gender')->nullable();
            // $table->string('nationality')->nullable();
            // $table->string('education')->nullable();
            // $table->string('experience')->nullable();
            // $table->text('skills')->nullable();
            // $table->text('certifications')->nullable();
            // $table->text('languages')->nullable();
            // $table->string('resume')->nullable();
            // $table->text('social_media')->nullable();
            // $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
