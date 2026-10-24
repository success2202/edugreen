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
        Schema::create('scholarship_applications', function (Blueprint $table) {
             $table->id();

        $table->string('application_number')->unique();
        $table->string('scholarship_programme');

        // Student information
        $table->string('first_name');
        $table->string('middle_name')->nullable();
        $table->string('last_name');
        $table->date('date_of_birth');
        $table->string('gender');
        $table->string('current_school');
        $table->string('current_class');

        // Parent or guardian information
        $table->string('parent_guardian_name');
        $table->string('relationship');
        $table->string('parent_guardian_phone');
        $table->string('parent_guardian_email')->nullable();
        $table->text('parent_guardian_address');

        // Application details
        $table->text('reason_for_applying');
        $table->string('academic_result')->nullable();
        $table->string('birth_certificate')->nullable();

        // Review information
        $table->string('status')->default('pending');
        $table->text('admin_notes')->nullable();

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarship_applications');
    }
};
