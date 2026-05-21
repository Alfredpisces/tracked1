<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\AssetAssignment;
use App\Models\CotRating;
use App\Models\DailyLessonLog;
use App\Models\ProfessionalGrowth;
use App\Models\Student;
use App\Models\IncidentReport;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $password = Hash::make(env('SEEDED_USER_PASSWORD', 'ChangeMe#123'));

        $admin = User::updateOrCreate([
            'email' => 'admin@tracked.edu.ph',
        ], [
            'employee_id' => 'SYS-ADMIN-001',
            'first_name' => 'System',
            'last_name' => 'Administrator',
            'email_verified_at' => now(),
            'password' => $password,
            'role' => 'admin',
            'current_tier' => null,
            'is_active' => true,
        ]);

        $schoolHead = User::updateOrCreate([
            'email' => 'schoolhead@deped.edu.ph',
        ], [
            'employee_id' => 'EMP-0002',
            'first_name' => 'Roberto',
            'last_name' => 'Aquino',
            'email_verified_at' => now(),
            'password' => $password,
            'role' => 'school_head',
            'current_tier' => 'highly_proficient',
            'is_active' => true,
        ]);

        $counselor = User::updateOrCreate([
            'email' => 'counselor@deped.edu.ph',
        ], [
            'employee_id' => 'EMP-0003',
            'first_name' => 'Grace',
            'last_name' => 'Custodio',
            'email_verified_at' => now(),
            'password' => $password,
            'role' => 'counselor',
            'current_tier' => null,
            'is_active' => true,
        ]);

        $teacher = User::updateOrCreate([
            'email' => 'teacher@deped.edu.ph',
        ], [
            'employee_id' => 'EMP-1001',
            'first_name' => 'Juan',
            'last_name' => 'Dela Cruz',
            'email_verified_at' => now(),
            'password' => $password,
            'role' => 'teacher',
            'current_tier' => 'proficient',
            'is_active' => true,
        ]);

        $student = Student::updateOrCreate([
            'lrn' => '108234091234',
        ], [
            'first_name' => 'Maria',
            'last_name' => 'Santos',
            'grade_level' => 'Grade 9',
            'section' => 'Rizal',
            'last_synced_at' => now(),
        ]);

        DailyLessonLog::updateOrCreate([
            'author_id' => $teacher->id,
            'target_date' => now()->toDateString(),
        ], [
            'reviewer_id' => $schoolHead->id,
            'subject' => 'Grade 9 Science',
            'objectives' => 'Understand the stages of cellular respiration.',
            'content' => 'Glycolysis, Krebs Cycle, Electron Transport Chain.',
            'learning_resources' => 'Science Textbook pages 45-50.',
            'procedures' => 'Introduction, group activity, reflection.',
            'reflection' => 'Students need more examples for lab work.',
            'is_ai_passed' => true,
            'status' => 'approved',
            'submitted_at' => now(),
        ]);

        ProfessionalGrowth::updateOrCreate([
            'teacher_id' => $teacher->id,
            'title' => 'Regional ICT Summit 2026',
        ], [
            'date_attended' => now()->subMonths(2)->toDateString(),
            'points' => 10,
            'verification_status' => 'verified',
            'verified_by' => $schoolHead->id,
            'verified_at' => now()->subMonth(),
        ]);

        CotRating::updateOrCreate([
            'teacher_id' => $teacher->id,
            'rating_date' => now()->subWeeks(2)->toDateString(),
        ], [
            'school_head_id' => $schoolHead->id,
            'score' => 4.7,
            'remarks' => 'Strong instructional pacing and classroom management.',
        ]);

        IncidentReport::updateOrCreate([
            'teacher_id' => $teacher->id,
            'student_id' => $student->id,
            'offense_type' => 'vandalism',
        ], [
            'incident_date' => now()->subDays(6)->toDateString(),
            'severity' => 'major',
            'narrative' => 'Student defaced classroom furniture during dismissal.',
            'status' => 'in_intervention',
            'counselor_id' => $counselor->id,
            'counselor_notes' => 'Parent conference scheduled.',
        ]);

        $asset = Asset::updateOrCreate([
            'serial_number' => 'LNV-2025-00192',
        ], [
            'name' => 'Lenovo ThinkPad Laptop',
            'asset_type' => 'epar',
            'condition_status' => 'functional',
            'status' => 'assigned',
            'acquisition_date' => now()->subYear()->toDateString(),
        ]);

        AssetAssignment::updateOrCreate([
            'asset_id' => $asset->id,
            'user_id' => $teacher->id,
            'released_at' => null,
        ], [
            'assigned_by' => $admin->id,
            'assigned_at' => now()->subMonths(9),
            'acknowledged_at' => now()->subMonths(9),
            'assignment_status' => 'acknowledged',
            'notes' => 'Classroom advisory device.',
        ]);
    }
}
