<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CallbackRequest;
use App\Models\Lead;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $query = Lead::query()->latest();

        if ($request->filled('page_source')) {
            $query->byPage($request->page_source);
        }

        if ($request->filled('statut')) {
            $query->byStatut($request->statut);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        if ($request->filled('search')) {
            $search = substr(strip_tags($request->search), 0, 100);
            $query->where(function ($q) use ($search) {
                $q->where('prenom', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('telephone', 'like', "%{$search}%");
            });
        }

        $leads = $query->paginate(20)->withQueryString();

        $statutCounts = Lead::selectRaw('statut, COUNT(*) as total')
            ->groupBy('statut')
            ->pluck('total', 'statut');

        $stats = [
            'total' => $statutCounts->sum(),
            'nouveau' => $statutCounts->get('nouveau', 0),
            'contacte' => $statutCounts->get('contacte', 0),
            'converti' => $statutCounts->get('converti', 0),
            'perdu' => $statutCounts->get('perdu', 0),
        ];

        return view('admin.leads.index', compact('leads', 'stats'));
    }

    public function show(Lead $lead)
    {
        return view('admin.leads.show', compact('lead'));
    }

    public function updateStatut(Request $request, Lead $lead)
    {
        $validated = $request->validate([
            'statut' => 'required|in:nouveau,contacte,converti,perdu',
        ]);

        $lead->update($validated);

        return back()->with('success', 'Statut mis à jour.');
    }

    public function export(Request $request): StreamedResponse
    {
        $query = Lead::query()->latest();

        if ($request->filled('page_source')) {
            $query->byPage($request->page_source);
        }

        if ($request->filled('statut')) {
            $query->byStatut($request->statut);
        }

        $filename = 'leads_' . now()->format('Y-m-d_His') . '.csv';

        return response()->streamDownload(function () use ($query) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'ID', 'Page', 'Prénom', 'Téléphone', 'Email',
                'Code postal', 'Sélection', 'Budget',
                'Statut', 'Source UTM', 'Date',
            ], ';');

            $query->chunk(100, function ($leads) use ($handle) {
                foreach ($leads as $lead) {
                    fputcsv($handle, [
                        $lead->id,
                        $lead->page_source,
                        $lead->prenom,
                        $lead->telephone,
                        $lead->email,
                        $lead->code_postal,
                        $lead->selection,
                        $lead->budget_investissement,
                        $lead->statut,
                        $lead->utm_source,
                        $lead->created_at->format('d/m/Y H:i'),
                    ], ';');
                }
            });

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    public function callbacks()
    {
        $callbacks = CallbackRequest::latest()->paginate(20);

        $stats = [
            'total' => CallbackRequest::count(),
            'nouveau' => CallbackRequest::byStatut('nouveau')->count(),
            'traite' => CallbackRequest::byStatut('traite')->count(),
        ];

        return view('admin.leads.callbacks', compact('callbacks', 'stats'));
    }

    public function updateCallbackStatut(Request $request, CallbackRequest $callbackRequest)
    {
        $validated = $request->validate([
            'statut' => 'required|in:nouveau,traite',
        ]);

        $callbackRequest->update($validated);

        return back()->with('success', 'Statut mis à jour.');
    }
}
