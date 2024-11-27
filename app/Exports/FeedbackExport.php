<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FeedbackExport implements FromCollection, WithHeadings, WithStyles
{
    protected $period;

    public function __construct($period)
    {
        $this->period = $period;
    }

    public function collection(): Collection
    {
        $query = DB::table('entries')
            ->join('answers', 'entries.id', '=', 'answers.entry_id')
            ->where('entries.survey_id', function ($query) {
                $query->select('id')
                    ->from('surveys')
                    ->where('name', 'Visitor Feedback')
                    ->limit(1);
            })
            ->whereIn('answers.question_id', range(14, 24))
            ->select('entries.device_identifier', 'answers.question_id', 'answers.value');

        switch ($this->period) {
            case 'monthly':
                $query->whereBetween('entries.created_at', [now()->startOfMonth(), now()->endOfMonth()]);
                break;
            case 'quarterly':
                $query->whereBetween('entries.created_at', [now()->firstOfQuarter(), now()->lastOfQuarter()]);
                break;
            case 'semi-annually':
                $query->whereBetween('entries.created_at', [now()->startOfYear(), now()->startOfYear()->addMonths(6)->endOfMonth()]);
                break;
            case 'annually':
                $query->whereBetween('entries.created_at', [now()->startOfYear(), now()->endOfYear()]);
                break;
        }

        $data = $query->get()
            ->groupBy('device_identifier')
            ->map(function ($group) {
                $result = ['device_identifier' => $group->first()->device_identifier];
                foreach ($group as $entry) {
                    $result['question_' . $entry->question_id] = $entry->value;
                }
                return $result;
            })
            ->values();

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Device Identifier', 'Visit Experience', 'Feedback', 'Ease of Navigation', 'AR Features Functionality', 'AR Experience Engagement', 'Recommendation Likelihood', 'App Improvement Suggestions', 'Office Helpfulness', 'Service Satisfaction', 'Staff Capability', 'Response Clarity'
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
        $sheet->setCellValue('A7', 'VISITOR FEEDBACK');
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

        // Add an empty row for spacing between the header and the feedback log
        $sheet->mergeCells('A8:P8');
        $sheet->setCellValue('A8', '');

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

        return [
            // Bold headings on the first row
            9 => ['font' => ['bold' => true]],
        ];
    }
}
