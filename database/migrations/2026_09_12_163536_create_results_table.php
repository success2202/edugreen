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
        Schema::create('results', function (Blueprint $table) {
            $table->id();

            // Student
            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();

            // Academic session and term
            $table->string('session'); 
            $table->enum('term', [
                'First Term',
                'Second Term',
                'Third Term'
            ]);

            // Subject
            $table->string('subject');

            // Scores
            $table->decimal('ca_score', 5, 2)->default(0);
            $table->decimal('exam_score', 5, 2)->default(0);
            $table->decimal('total_score', 5, 2)->default(0);

            // Grade and remark
            $table->string('grade')->nullable();
            $table->string('remark')->nullable();

            $table->timestamps();

            // Prevent duplicate subject result
            $table->unique([
                'student_id',
                'session',
                'term',
                'subject'
            ]);
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
