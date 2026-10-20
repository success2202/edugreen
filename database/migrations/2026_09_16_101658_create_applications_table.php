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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
             // Student information
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');

            $table->date('date_of_birth');
            $table->enum('gender', ['Male', 'Female']);

            $table->enum('level', [
                'Nursery',
                'Primary',
                'Secondary'
            ]);

            $table->string('class');

            $table->string('previous_school')->nullable();
            $table->string('student_photo')->nullable();

            // Parent / Guardian information
            $table->string('parent_name');
            $table->string('parent_phone');
            $table->string('parent_email')->nullable();

            $table->string('relationship');
            $table->text('parent_address');

            // Application information
            $table->string('session');
            $table->string('referral_source')->nullable();
            $table->text('message')->nullable();

            // Application status
            $table->enum('status', [
                'Pending',
                'Reviewed',
                'Accepted',
                'Rejected'
            ])->default('Pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
