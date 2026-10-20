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
        Schema::create('school_fee_payments', function (Blueprint $table) {
              $table->id();

            $table->unsignedBigInteger('student_id');

            $table->string('session', 20);
            $table->string('term', 30);

            $table->decimal('amount', 10, 2)->default(0);

            $table->string('status', 20)->default('unpaid');

            $table->date('payment_date')->nullable();
            $table->string('payment_reference')->nullable();
            $table->text('notes')->nullable();

            $table->unsignedBigInteger('recorded_by')->nullable();

            $table->timestamps();

            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');

            $table->unique(
                ['student_id', 'session', 'term'],
                'student_session_term_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_fee_payments');
    }
};
