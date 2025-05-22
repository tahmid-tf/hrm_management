<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class IndividualAttendanceExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        return Attendance::select('id', 'employee_id', 'date', 'check_in_time', 'check_out_time', 'status', 'working_hours', 'created_at', 'updated_at')
            ->where('employee_id', $this->id)
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
            'Status',
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
            $id += 1,
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

    // --------------------- column color function , if $attendance->status == Late, it will trigger ---------------------

    public function styles(Worksheet $sheet)
    {
        foreach ($sheet->getRowIterator() as $row) {
            $rowIndex = $row->getRowIndex();
            $statusCell = $sheet->getCell("G$rowIndex")->getValue(); // Column G contains status

            if ($statusCell === "Present") {
                $sheet->getStyle("G$rowIndex")->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '28A745'], // Green background for "Present" status
                    ],
                    'font' => [
                        'color' => ['rgb' => 'FFFFFF'], // White text for better contrast
                        'bold' => true, // Make it bold for emphasis
                    ]
                ]);
            }

            if ($statusCell === "Late") {
                $sheet->getStyle("G$rowIndex")->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'FF0000'], // Red background for "Late" status
                    ],
                    'font' => [
                        'color' => ['rgb' => 'FFFFFF'], // White text for better contrast
                        'bold' => true, // Make it bold for emphasis
                    ]
                ]);
            }
        }

        // Prevent selection issue
        $sheet->setSelectedCells('A1'); // Moves focus away from the "Late" cells
    }
}
