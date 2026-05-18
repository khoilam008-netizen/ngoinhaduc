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
        Schema::create('course_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('session_type'); // Sáng, Tối, Luyện thi
            $table->string('level'); // A1, A2, B1, B2...
            $table->text('schedule_time'); // Thứ 2,3,4,5,6 8.00 - 11.30
            $table->string('duration'); // 8 tuần, 25 tiết
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_schedules');
    }
};
