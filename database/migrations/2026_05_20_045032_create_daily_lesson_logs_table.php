<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daily_lesson_logs', function (Blueprint $table) {
            $table->id();

            // Link to the Teacher (Author) and the School Head (Reviewer)
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('reviewer_id')->nullable()->constrained('users')->nullOnDelete();

            // Academic Details
            $table->date('target_date');
            $table->string('subject');
            $table->text('objectives')->nullable();
            $table->text('content')->nullable();
            $table->text('learning_resources')->nullable();
            $table->text('procedures')->nullable();
            $table->text('reflection')->nullable();

            // AI and Approval Tracking
            $table->boolean('is_ai_passed')->default(false);
            $table->enum('status', ['draft', 'pending', 'approved', 'returned'])->default('draft');
            $table->timestamp('submitted_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daily_lesson_logs');
    }
};
