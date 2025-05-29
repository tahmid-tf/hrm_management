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
        return Applicant::with('jobPosting')->get()->makeHidden(['updated_at']);
    }

    public function headings(): array
    {
        return [
            'Job Title',
            'Name',
            'Email',
            'Phone',
            'resume',
            'status',
            'Submitted At',
        ];
    }

    public function map($applicant): array
    {
        return [
            $applicant->jobPosting->title,
            $applicant->name,
            $applicant->email,
            $applicant->phone,
            asset('storage/' . $applicant->resume),
            $applicant->status,
            $applicant->created_at->format('d-m-Y'),
        ];
    }
}
