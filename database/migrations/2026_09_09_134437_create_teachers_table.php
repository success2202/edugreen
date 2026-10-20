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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->enum('gender', ['Male', 'Female'])->nullable();

            $table->string('subject')->nullable();

            $table->enum('academic_level', [
                'Nursery',
                'Primary',
                'Secondary'
            ])->nullable();

            $table->string('qualification')->nullable();

            $table->text('bio')->nullable();

            $table->string('image')->nullable();

            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
