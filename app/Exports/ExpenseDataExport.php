<?php

namespace App\Exports;

use App\Models\Expense;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExpenseDataExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Expense::all()->makeHidden(['updated_at','admin_comment']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Employee Name',
            'Expense Category',
            'Amount',
            'Date',
            'Description',
            'Status',
            'Expense Submission Date',
        ];
    }

    public function map($expense): array
    {
        return [
            $expense->id,
            $expense->employee->name,
            $expense->category->name,
            $expense->amount,
            $expense->date,
        ];
    }
}
