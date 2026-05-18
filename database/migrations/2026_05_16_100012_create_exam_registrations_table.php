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
        Schema::create('exam_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('birth_date');
            $table->string('birth_place');
            $table->string('passport_number');
            $table->string('gender');
            $table->string('exam_level');
            $table->string('exam_month');
            $table->string('phone');
            $table->string('email');
            $table->text('message')->nullable();
            $table->string('status')->default('Mới');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_registrations');
    }
};
