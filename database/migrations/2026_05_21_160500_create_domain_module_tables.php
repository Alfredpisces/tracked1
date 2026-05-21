<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('lrn', 12)->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('grade_level')->nullable();
            $table->string('section')->nullable();
            $table->timestamp('last_synced_at')->nullable();
            $table->timestamps();
        });

        Schema::create('cot_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('school_head_id')->nullable()->constrained('users')->nullOnDelete();
            $table->date('rating_date');
            $table->decimal('score', 4, 2);
            $table->text('remarks')->nullable();
            $table->timestamps();
        });

        Schema::create('professional_growth', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->date('date_attended');
            $table->decimal('points', 6, 2);
            $table->string('certificate_path')->nullable();
            $table->enum('verification_status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });

        Schema::create('incident_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->date('incident_date');
            $table->enum('severity', ['minor', 'major']);
            $table->string('offense_type');
            $table->text('narrative');
            $table->enum('status', ['reported', 'in_intervention', 'escalated', 'resolved', 'closed'])->default('reported');
            $table->foreignId('counselor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->text('counselor_notes')->nullable();
            $table->string('principal_action')->nullable();
            $table->timestamp('resolved_at')->nullable();
            $table->timestamps();
        });

        Schema::create('counseling_interventions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incident_report_id')->constrained('incident_reports')->cascadeOnDelete();
            $table->foreignId('counselor_id')->constrained('users')->cascadeOnDelete();
            $table->string('intervention_type')->nullable();
            $table->text('notes');
            $table->timestamp('scheduled_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->string('outcome')->nullable();
            $table->timestamps();
        });

        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('serial_number')->unique();
            $table->enum('asset_type', ['epar', 'ics'])->default('epar');
            $table->enum('condition_status', ['functional', 'damaged', 'lost', 'condemned', 'replaced'])->default('functional');
            $table->enum('status', ['available', 'assigned', 'maintenance', 'retired'])->default('available');
            $table->date('acquisition_date')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('asset_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained('assets')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('assigned_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('acknowledged_at')->nullable();
            $table->timestamp('released_at')->nullable();
            $table->enum('assignment_status', ['pending_signature', 'acknowledged', 'reported_issue', 'released'])->default('pending_signature');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asset_assignments');
        Schema::dropIfExists('assets');
        Schema::dropIfExists('counseling_interventions');
        Schema::dropIfExists('incident_reports');
        Schema::dropIfExists('professional_growth');
        Schema::dropIfExists('cot_ratings');
        Schema::dropIfExists('students');
    }
};
