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
        Schema::create('deductions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')->constrained('users')->onDelete('cascade');
            $table->date('month'); // Like payrolls, format YYYY-MM-01
            $table->string('type'); // e.g., Loan, Absence, Tax
            $table->decimal('amount', 10, 2);
            $table->text('remarks')->nullable();
            $table->foreignId('added_by')->constrained('users')->onDelete('cascade');

            $table->index(['employee_id', 'month']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deductions');
    }
};
