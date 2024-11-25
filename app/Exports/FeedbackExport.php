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
        $query = DB::table('answers')
            ->select('entry_id', 'question_id', 'value')
            ->whereIn('question_id', range(14, 24));

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
            ->map(function ($answers) {
                $result = [
                    'id' => $answers->first()->entry_id,
                    'device_identifier' => null,
                    'question_14' => null,
                    'question_15' => null,
                    'question_16' => null,
                    'question_17' => null,
                    'question_18' => null,
                    'question_19' => null,
                    'question_20' => null,
                    'question_21' => null,
                    'question_22' => null,
                    'question_23' => null,
                    'question_24' => null,
                ];

                foreach ($answers as $answer) {
                    $result['question_' . $answer->question_id] = $answer->value;
                }

                return $result;
            })
            ->values();

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'ID', 'Device Identifier', 'Question 14', 'Question 15', 'Question 16', 'Question 17', 'Question 18', 'Question 19', 'Question 20', 'Question 21', 'Question 22', 'Question 23', 'Question 24'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $highestColumn = $sheet->getHighestColumn();
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

        for ($col = 1; $col <= $highestColumnIndex; $col++) {
            $cell = $sheet->getCellByColumnAndRow($col, 1);
            if ($cell->getValue() !== '') {
                $sheet->getStyleByColumnAndRow($col, 1)->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'FFFFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => 'FF4CAF50',
                        ],
                    ],
                ]);
            }
        }

        $rowCount = $sheet->getHighestRow();
        for ($row = 2; $row <= $rowCount; $row++) {
            if ($row % 2 == 0) {
                $sheet->getStyle('A'.$row.':'.$highestColumn.$row)->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => 'FFE0E0E0',
                        ],
                    ],
                ]);
            } else {
                $sheet->getStyle('A'.$row.':'.$highestColumn.$row)->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => 'FFFFFFFF',
                        ],
                    ],
                ]);
            }
        }

        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
