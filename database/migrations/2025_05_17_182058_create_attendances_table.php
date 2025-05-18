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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('users')->onDelete('cascade');

            // foreign ID breakdown
//            $table->unsignedBigInteger('employee_id');
//            $table->foreign('employee_id')->references('id')->on('users');

            $table->date('date');
            $table->time('check_in_time')->nullable();
            $table->time('check_out_time')->nullable();
            $table->string('status')->default('Absent'); // Present, Absent, Late, Half-day
            $table->decimal('working_hours', 5, 2)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['employee_id', 'date']); // One attendance per employee per day
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
