<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChartController extends Controller
{
    protected $pdf;

    public function __construct(PDF $pdf)
    {
        $this->pdf = $pdf;
    }

    public function saveCharts(Request $request)
    {
        $ageChart = $request->input('ageChart');
        $genderChart = $request->input('genderChart');
        $mostVisitedChart = $request->input('mostVisitedChart');

        $ageData = $request->input('ageData');
        $genderData = $request->input('genderData');
        $mostVisitedData = $request->input('mostVisitedData');

        Storage::put('public/charts/ageChart.png', base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $ageChart)));
        Storage::put('public/charts/genderChart.png', base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $genderChart)));
        Storage::put('public/charts/mostVisitedChart.png', base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $mostVisitedChart)));

        Storage::put('public/charts/ageData.json', json_encode($ageData));
        Storage::put('public/charts/genderData.json', json_encode($genderData));
        Storage::put('public/charts/mostVisitedData.json', json_encode($mostVisitedData));


        return response()->json(['success' => true]);
    }

    public function printCharts()
    {
        $ageChart = public_path('storage/charts/ageChart.png');
        $genderChart = public_path('storage/charts/genderChart.png');
        $mostVisitedChart = public_path('storage/charts/mostVisitedChart.png');

        $ageData = json_decode(Storage::get('public/charts/ageData.json'), true) ?? [];
        $genderData = json_decode(Storage::get('public/charts/genderData.json'), true) ?? [];
        $mostVisitedData = json_decode(Storage::get('public/charts/mostVisitedData.json'), true) ?? [];

        $pdf = $this->pdf->loadView('print.chart', compact('ageChart', 'genderChart', 'mostVisitedChart', 'ageData', 'genderData', 'mostVisitedData'));
        return $pdf->download('charts.pdf');
    }
}
