<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConsultationRequest;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Exports\ConsultationsExport;
use Maatwebsite\Excel\Facades\Excel;

class ConsultationController extends Controller
{
    public function index() {
        $requests = ConsultationRequest::latest()->paginate(20);
        $total = ConsultationRequest::count();
        $today = ConsultationRequest::whereDate('created_at', today())->count();
        $enCours = ConsultationRequest::where('status', 'en_cours')->count();
        $valide  = ConsultationRequest::where('status', 'valide')->count();

        // dd($requests[0]);
        return view('admin.consultations.index', compact('requests', 'total', 'today','enCours','valide'));
    }

    public function destroy(ConsultationRequest $consultationRequest)
    {
        $consultationRequest->delete();
        return back()->with('success', 'Demande supprimée.');
    }

    public function exportXlsx()
    {
        return Excel::download(new ConsultationsExport, 'demandes-consultation.xlsx');
    }

    public function export(): StreamedResponse
    {
        $filename = 'demandes-consultation.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Date', 'Nom', 'Téléphone', 'Rôle', 'Enjeu']);
            ConsultationRequest::latest()->chunk(200, function ($rows) use ($handle) {
                foreach ($rows as $r) {
                    fputcsv($handle, [$r->created_at->format('d/m/Y H:i'), $r->name, $r->phone, $r->role, $r->need]);
                }
            });
            fclose($handle);
        };

        return response()->streamDownload($callback, $filename, $headers);
    }
    public function updateStatus(Request $request, ConsultationRequest $consultationRequest)
    {
        $request->validate([
            'status' => 'required|in:en_attente,en_cours,valide',
        ]);

        $consultationRequest->update(['status' => $request->status]);

        return back()->with('success', 'Statut mis à jour.');
    }
}
