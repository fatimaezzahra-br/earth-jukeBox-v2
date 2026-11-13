<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class EarthController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'observations' => $this->sampleObservations(),
        ]);
    }

    public function observations(): JsonResponse
    {
        return response()->json([
            'source' => 'Données de démonstration',
            'observations' => $this->sampleObservations(),
        ]);
    }

    public function export(): StreamedResponse
    {
        $observations = $this->sampleObservations();

        return response()->streamDownload(function () use ($observations): void {
            $output = fopen('php://output', 'w');
            fputcsv($output, ['Date', 'Température de surface (°C)', 'Fréquence (Hz)']);

            foreach ($observations as $observation) {
                fputcsv($output, [
                    $observation['date'],
                    $observation['temperature'],
                    $observation['frequency'],
                ]);
            }

            fclose($output);
        }, 'earth-jukebox-observations.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    private function sampleObservations(): array
    {
        return [
            ['date' => '2025-01', 'temperature' => 13.8, 'frequency' => 696],
            ['date' => '2025-02', 'temperature' => 14.1, 'frequency' => 700],
            ['date' => '2025-03', 'temperature' => 14.5, 'frequency' => 704],
            ['date' => '2025-04', 'temperature' => 15.0, 'frequency' => 711],
            ['date' => '2025-05', 'temperature' => 15.4, 'frequency' => 716],
            ['date' => '2025-06', 'temperature' => 16.1, 'frequency' => 723],
            ['date' => '2025-07', 'temperature' => 16.8, 'frequency' => 731],
            ['date' => '2025-08', 'temperature' => 17.4, 'frequency' => 738],
            ['date' => '2025-09', 'temperature' => 17.1, 'frequency' => 734],
            ['date' => '2025-10', 'temperature' => 16.4, 'frequency' => 727],
            ['date' => '2025-11', 'temperature' => 15.7, 'frequency' => 718],
            ['date' => '2025-12', 'temperature' => 14.8, 'frequency' => 708],
        ];
    }
}
