<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class VisitorInformationExport implements FromCollection, WithHeadings, WithStyles
{
    protected $period;

    public function __construct($period)
    {
        $this->period = $period;
    }

    public function collection(): Collection
    {
        $usedEntryIds = [];

        $query = DB::table('answers')
            ->select('entry_id', 'question_id', 'value')
            ->whereIn('question_id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]);

        switch ($this->period) {
            case 'monthly':
                $query->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                break;
            case 'quarterly':
                $query->whereBetween('created_at', [now()->firstOfQuarter(), now()->lastOfQuarter()]);
                break;
            case 'semi-annually':
                $query->whereBetween('created_at', [now()->startOfYear(), now()->startOfYear()->addMonths(6)->endOfMonth()]);
                break;
            case 'annually':
                $query->whereBetween('created_at', [now()->startOfYear(), now()->endOfYear()]);
                break;
        }

        $data = $query->get()
            ->groupBy('entry_id')
            ->map(function ($answers, $entryId) use (&$usedEntryIds) {
                if (in_array($entryId, $usedEntryIds)) {
                    return null;
                }

                $entry1 = DB::table('entries')->where('id', $entryId)->where('survey_id', 1)->first();

                if (!$entry1) {
                    return null;
                }

                $entry2 = DB::table('entries')
                    ->where('device_identifier', $entry1->device_identifier)
                    ->where('survey_id', 2)
                    ->whereNotIn('id', $usedEntryIds)
                    ->first();

                if ($entry2) {
                    $usedEntryIds[] = $entryId;
                    $usedEntryIds[] = $entry2->id;
                }

                $result = [
                    'id' => $entryId,
                    'bus_number' => null,
                    'full_name' => null,
                    'address' => null,
                    'nationality' => null,
                    'gender' => null,
                    'students_grade_school' => null,
                    'students_high_school' => null,
                    'students_college' => null,
                    'pwd' => null,
                    'age_17_below' => null,
                    'age_18_30' => null,
                    'age_31_45' => null,
                    'age_60_above' => null,
                    'time_in' => $entry1 ? $entry1->created_at : null,
                    'time_out' => $entry2 ? $entry2->created_at : null,
                    'blank1' => '', // Add first blank cell
                    'blank2' => '', // Add second blank cell
                    'visit_rating' => null,
                    'feedback' => null,
                    'ease_of_navigation' => null,
                    'ar_features_function' => null,
                    'ar_experience_engagement' => null,
                    'recommend_app' => null,
                    'improve_app' => null,
                    'office_helpfulness' => null,
                    'service_satisfaction' => null,
                    'staff_knowledge' => null,
                    'response_clarity' => null,
                ];

                foreach ($answers as $answer) {
                    switch ($answer->question_id) {
                        case 1:
                            $result['bus_number'] = $answer->value;
                            break;
                        case 2:
                            $result['full_name'] = $answer->value;
                            break;
                        case 3:
                            $result['address'] = $answer->value;
                            break;
                        case 4:
                            $result['nationality'] = $answer->value;
                            break;
                        case 5:
                            $result['gender'] = $answer->value;
                            break;
                        case 6:
                            $result['students_grade_school'] = $answer->value;
                            break;
                        case 7:
                            $result['students_high_school'] = $answer->value;
                            break;
                        case 8:
                            $result['students_college'] = $answer->value;
                            break;
                        case 9:
                            $result['pwd'] = $answer->value;
                            break;
                        case 10:
                            $result['age_17_below'] = $answer->value;
                            break;
                        case 11:
                            $result['age_18_30'] = $answer->value;
                            break;
                        case 12:
                            $result['age_31_45'] = $answer->value;
                            break;
                        case 13:
                            $result['age_60_above'] = $answer->value;
                            break;
                    }
                }

                if ($entry2) {
                    $entry2Answers = DB::table('answers')
                        ->select('question_id', 'value')
                        ->where('entry_id', $entry2->id)
                        ->whereIn('question_id', [14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24])
                        ->get();

                    foreach ($entry2Answers as $answer) {
                        switch ($answer->question_id) {
                            case 14:
                                $result['visit_rating'] = $answer->value;
                                break;
                            case 15:
                                $result['feedback'] = $answer->value;
                                break;
                            case 16:
                                $result['ease_of_navigation'] = $answer->value;
                                break;
                            case 17:
                                $result['ar_features_function'] = $answer->value;
                                break;
                            case 18:
                                $result['ar_experience_engagement'] = $answer->value;
                                break;
                            case 19:
                                $result['recommend_app'] = $answer->value;
                                break;
                            case 20:
                                $result['improve_app'] = $answer->value;
                                break;
                            case 21:
                                $result['office_helpfulness'] = $answer->value;
                                break;
                            case 22:
                                $result['service_satisfaction'] = $answer->value;
                                break;
                            case 23:
                                $result['staff_knowledge'] = $answer->value;
                                break;
                            case 24:
                                $result['response_clarity'] = $answer->value;
                                break;
                        }
                    }
                }

                return $result;
            })
            ->filter()
            ->values();

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'ID', 'Bus Number', 'Full Name', 'Address', 'Nationality', 'Gender',
            'Students Grade School', 'Students High School', 'Students College',
            'PWD', 'Age 17 Below', 'Age 18-30', 'Age 31-45', 'Age 60 Above',
            'Time In', 'Time Out', '', '', // Add two blank headers
            'Visit Rating', 'Feedback',
            'Ease of Navigation', 'AR Features Function', 'AR Experience Engagement',
            'Recommend App', 'Improve App', 'Office Helpfulness', 'Service Satisfaction',
            'Staff Knowledge', 'Response Clarity'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Get the highest column index
        $highestColumn = $sheet->getHighestColumn();
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

        // Loop through each column in the first row
        for ($col = 1; $col <= $highestColumnIndex; $col++) {
            $cell = $sheet->getCellByColumnAndRow($col, 1);
            if ($cell->getValue() !== '' && $col !== 17 && $col !== 18) { // Exclude columns Q (17th) and R (18th)
                $sheet->getStyleByColumnAndRow($col, 1)->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'FFFFFFFF'], // White text
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => 'FF4CAF50', // Green background color for headers
                        ],
                    ],
                ]);
            }
        }

        // Apply alternating row colors
        $rowCount = $sheet->getHighestRow();
        for ($row = 2; $row <= $rowCount; $row++) {
            // Check if the row is even or odd and apply different styles
            if ($row % 2 == 0) {
                // Apply a light gray background for even rows
                $sheet->getStyle('A'.$row.':'.$highestColumn.$row)->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => 'FFF2F2F2', // Light gray background
                        ],
                    ],
                ]);
            } else {
                // Apply a white background for odd rows
                $sheet->getStyle('A'.$row.':'.$highestColumn.$row)->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => 'FFFFFFFF', // White background
                        ],
                    ],
                ]);
            }
        }

        // Style the "Time In" and "Time Out" columns to use a different format
        $sheet->getStyle('O2:P'.$rowCount)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DATETIME);

        return [
            // Bold headings on the first row
            1 => ['font' => ['bold' => true]],
        ];
    }
}
