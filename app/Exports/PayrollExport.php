<?php

namespace App\Exports;

use App\Models\Payroll;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class PayrollExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, ShouldQueue, WithChunkReading
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Payroll::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Employee Name',
            'Month',
            'Basic Salary',
            'Allowance',
            'Deduction',
            'Net Salary',
            'Status',
            'Processed By',
        ];
    }

    public function map($payroll): array
    {
        return [
            $payroll->id,
            $payroll->employee->name,
            $payroll->month,
            $payroll->basic_salary,
            $payroll->allowances,
            $payroll->deductions,
            $payroll->net_salary,
            $payroll->status,
            $payroll->processor->name,
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
