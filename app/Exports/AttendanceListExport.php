<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AttendanceListExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Attendance::select('id', 'employee_id', 'date', 'check_in_time', 'check_out_time', 'status', 'working_hours', 'created_at', 'updated_at')
        ->orderBy('id', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Serial',
            'Employee ID',
            'Employee Name',
            'Date',
            'Time In',
            'Time Out',
            'status',
            'Working Hours',
            'Created At',
            'Updated At'
        ];
    }

    public function map($attendance): array
    {
        $id = 0;

        // --------------------------------- Format working hours ---------------------------------

        $hours = floor($attendance->working_hours);
        $minutes = round(($attendance->working_hours - $hours) * 60);

        $parts = [];

        if ($hours > 0) {
            $parts[] = $hours . ' ' . ($hours === 1 ? 'hr' : 'hrs');
        }

        if ($minutes > 0) {
            $parts[] = $minutes . ' ' . ($minutes === 1 ? 'min' : 'mins');
        }

        $formattedTime = count($parts) ? implode(' ', $parts) : '0 min';


        return [
            $id+=1,
            $attendance->employee_id,
            $attendance->employee->name,
            $attendance->date,
            $attendance->check_in_time,
            $attendance->check_out_time,
            $attendance->status,
            $formattedTime,
            $attendance->created_at,
            $attendance->updated_at,
        ];
    }
}
