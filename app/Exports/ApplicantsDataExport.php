<?php

namespace App\Exports;

use App\Models\Applicant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ApplicantsDataExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Applicant::with('jobPosting')->get()->makeHidden(['created_at', 'updated_at']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Job Title',
            'Name',
            'Email',
            'Phone',
            'resume',
            'status'
        ];
    }

    public function map($applicant): array
    {
        return [
            $applicant->id,
            $applicant->jobPosting->title,
            $applicant->name,
            $applicant->email,
            $applicant->phone,
            asset('storage/' . $applicant->resume),
            $applicant->status,
        ];
    }
}
