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
            $table->string('name');
            $table->string('enroll_number')->unique();
            $table->string('father_name');
            $table->string('number');
            $table->string('father_number');
            $table->string('email')->unique();
            $table->string('city');
            $table->string('address');
            $table->integer('room_number')->nullable()->default(null);
            $table->date('allotment_date')->nullable()->default(null);
            $table->string('course_name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
