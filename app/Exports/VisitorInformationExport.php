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
            ->whereIn('question_id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]);

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
                    'full_name' => null,
                    'address' => null,
                    'nationality' => null,
                    'male' => null,
                    'female' => null,
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
                ];

                foreach ($answers as $answer) {
                    switch ($answer->question_id) {
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
                            $result['male'] = $answer->value;
                            break;
                        case 6:
                            $result['female'] = $answer->value;
                            break;
                        case 7:
                            $result['students_grade_school'] = $answer->value;
                            break;
                        case 8:
                            $result['students_high_school'] = $answer->value;
                            break;
                        case 9:
                            $result['students_college'] = $answer->value;
                            break;
                        case 10:
                            $result['pwd'] = $answer->value;
                            break;
                        case 11:
                            $result['age_17_below'] = $answer->value;
                            break;
                        case 12:
                            $result['age_18_30'] = $answer->value;
                            break;
                        case 13:
                            $result['age_31_45'] = $answer->value;
                            break;
                        case 14:
                            $result['age_60_above'] = $answer->value;
                            break;
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
            'ID', 'Full Name', 'Address', 'Nationality', 'Male', 'Female',
            'Students Grade School', 'Students High School', 'Students College', 'PWD',
            'Age 17 Below', 'Age 18-30', 'Age 31-45', 'Age 60 Above', 'Time In', 'Time Out'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Add company information at the top
        $sheet->mergeCells('A1:P1');
        $sheet->setCellValue('A1', 'National Historical Commission of the Philippines');
        $sheet->getStyle('A1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 16,
                'color' => ['argb' => 'FF000000'], // Black text
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->mergeCells('A2:P2');
        $sheet->setCellValue('A2', 'Historical Sites and Education Division');
        $sheet->getStyle('A2')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 14,
                'color' => ['argb' => 'FF000000'], // Black text
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->mergeCells('A3:P3');
        $sheet->setCellValue('A3', 'Museo ni Miguel Malvar');
        $sheet->getStyle('A3')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['argb' => 'FF000000'], // Black text
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->mergeCells('A4:P4');
        $sheet->setCellValue('A4', 'Sto. Tomas Batangas');
        $sheet->getStyle('A4')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['argb' => 'FF000000'], // Black text
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Add an empty row for spacing
        $sheet->mergeCells('A5:P5');
        $sheet->setCellValue('A5', '');

        // Add another empty row for additional spacing
        $sheet->mergeCells('A6:P6');
        $sheet->setCellValue('A6', '');

        $sheet->mergeCells('A7:P7');
        $sheet->setCellValue('A7', 'VISITOR LOG FORM');
        $sheet->getStyle('A7')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 14,
                'color' => ['argb' => 'FF000000'], // Black text
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Add an empty row for spacing between the header and the visitor log
        $sheet->mergeCells('A8:P8');
        $sheet->setCellValue('A8', '');

        // Unmerge cell A8 before merging E8:F8
        $sheet->unmergeCells('A8:P8');

        // Merge cells E8:F8 and add "Gender"
        $sheet->mergeCells('E8:F8');
        $sheet->setCellValue('E8', 'Gender');
        $sheet->getStyle('E8')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['argb' => 'FFFFFFFF'], // White text
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FF4CAF50', // Green background color for headers
                ],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'], // Black border
                ],
            ],
        ]);

        // Merge cells G8:I8 and add "No. of Students"
        $sheet->mergeCells('G8:I8');
        $sheet->setCellValue('G8', 'No. of Students');
        $sheet->getStyle('G8')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['argb' => 'FFFFFFFF'], // White text
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FF4CAF50', // Green background color for headers
                ],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'], // Black border
                ],
            ],
        ]);

        // Merge cells K8:N8 and add "No. of Visitor per Age Group"
        $sheet->mergeCells('K8:N8');
        $sheet->setCellValue('K8', 'No. of Visitor per Age Group');
        $sheet->getStyle('K8')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['argb' => 'FFFFFFFF'], // White text
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FF4CAF50', // Green background color for headers
                ],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'], // Black border
                ],
            ],
        ]);

        // Adjust the header row to start from row 9
        $sheet->fromArray($this->headings(), null, 'A9');

        // Get the highest column index
        $highestColumn = $sheet->getHighestColumn();
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

        // Loop through each column in the first row
        for ($col = 1; $col <= $highestColumnIndex; $col++) {
            $cell = $sheet->getCellByColumnAndRow($col, 9);
            if ($cell->getValue() !== '') {
                $sheet->getStyleByColumnAndRow($col, 9)->applyFromArray([
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
        for ($row = 10; $row <= $rowCount; $row++) {
            // Check if the row is even or odd and apply different styles
            if ($row % 2 == 0) {
                // Apply a light gray background for even rows
                $sheet->getStyle('A'.$row.':'.$highestColumn.$row)->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => 'FFE0E0E0', // Light gray background color for even rows
                        ],
                    ],
                ]);
            } else {
                // Apply a white background for odd rows
                $sheet->getStyle('A'.$row.':'.$highestColumn.$row)->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => 'FFFFFFFF', // White background color for odd rows
                        ],
                    ],
                ]);
            }
        }

        // Style the "Time In" and "Time Out" columns to use a different format
        $sheet->getStyle('P10:P'.$rowCount)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DATETIME);

        // Set the "Age 60 Above" column to text format
        $sheet->getStyle('N10:N'.$rowCount)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

        return [
            // Bold headings on the first row
            9 => ['font' => ['bold' => true]],
        ];
    }
}
