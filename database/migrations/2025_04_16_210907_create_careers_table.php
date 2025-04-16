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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('location_id');
            $table->string('department_id');
            $table->enum('job_level', ['Internship', 'Entry Level', 'Associate', 'Mid Level', 'Director', 'Executive']);
            $table->string('experience');
            $table->enum('work_type', ['On-site', 'Remote', 'Hybrid']);
            $table->enum('job_type', ['Full Time', 'Part Time', 'Remote Jobs', 'Freelancer']);
            $table->string('deadline_date');
            $table->longtext('description');
            $table->enum('qualification', ['Bachelor', 'Master', 'PhD', 'Other']); // Menambahkan kolom qualification
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
