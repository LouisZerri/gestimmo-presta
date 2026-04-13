@extends('admin.layouts.app')

@section('title', 'Lead #' . $lead->id)

@section('content')
<div class="space-y-6">
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.leads.index') }}" class="text-gray-400 hover:text-gray-600 transition">&larr; Retour</a>
        <h2 class="text-2xl font-bold text-gray-900">Lead #{{ $lead->id }}</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Contact --}}
        <div class="bg-white rounded-xl p-6 shadow-sm space-y-4">
            <h3 class="font-bold text-brand-blue">Contact</h3>
            <div>
                <p class="text-xs text-gray-400">Prénom</p>
                <p class="font-semibold">{{ $lead->prenom }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400">Téléphone</p>
                <a href="tel:{{ $lead->telephone }}" class="font-semibold text-blue-600">{{ $lead->telephone }}</a>
            </div>
            <div>
                <p class="text-xs text-gray-400">Email</p>
                <a href="mailto:{{ $lead->email }}" class="font-semibold text-blue-600">{{ $lead->email }}</a>
            </div>
            <div>
                <p class="text-xs text-gray-400">Code postal</p>
                <p class="font-semibold">{{ $lead->code_postal ?? '—' }}</p>
            </div>
            @if($lead->selection)
            <div>
                <p class="text-xs text-gray-400">{{ $lead->page_source === 'P1' ? 'Type de logement' : 'Profil' }}</p>
                <p class="font-semibold">{{ ucfirst($lead->selection) }}</p>
            </div>
            @endif
            @if($lead->budget_investissement)
            <div>
                <p class="text-xs text-gray-400">Budget</p>
                <p class="font-semibold">{{ $lead->budget_investissement }}</p>
            </div>
            @endif
        </div>

        {{-- Détails --}}
        <div class="bg-white rounded-xl p-6 shadow-sm space-y-4">
            <h3 class="font-bold text-brand-blue">Détails</h3>
            <div>
                <p class="text-xs text-gray-400">Page source</p>
                @php
                    $pageLabels = ['P1' => 'P1 — EDL Expert', 'P2' => 'P2 — App EDL', 'P3' => 'P3 — Investissement', 'P4' => 'P4 — Défiscalisation'];
                @endphp
                <p class="font-semibold">{{ $pageLabels[$lead->page_source] ?? $lead->page_source }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 mb-1">Statut</p>
                <form method="POST" action="{{ route('admin.leads.statut', $lead) }}">
                    @csrf
                    @method('PATCH')
                    <select name="statut" onchange="this.form.submit()" class="px-3 py-1.5 text-sm font-semibold rounded-lg border border-gray-300 cursor-pointer">
                        <option value="nouveau" {{ $lead->statut === 'nouveau' ? 'selected' : '' }}>Nouveau</option>
                        <option value="contacte" {{ $lead->statut === 'contacte' ? 'selected' : '' }}>Contacté</option>
                        <option value="converti" {{ $lead->statut === 'converti' ? 'selected' : '' }}>Converti</option>
                        <option value="perdu" {{ $lead->statut === 'perdu' ? 'selected' : '' }}>Perdu</option>
                    </select>
                </form>
            </div>
            <div>
                <p class="text-xs text-gray-400">Date de réception</p>
                <p class="font-semibold">{{ $lead->created_at->format('d/m/Y à H:i') }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400">IP (anonymisée)</p>
                <p class="text-sm text-gray-500">{{ $lead->ip_address ?? '—' }}</p>
            </div>
            @if($lead->utm_source)
            <div class="bg-gray-50 rounded-lg p-3 space-y-1">
                <p class="text-xs text-gray-400 font-semibold">Paramètres UTM</p>
                <p class="text-xs text-gray-500">Source : <strong class="text-gray-700">{{ $lead->utm_source }}</strong></p>
                @if($lead->utm_medium)<p class="text-xs text-gray-500">Medium : <strong class="text-gray-700">{{ $lead->utm_medium }}</strong></p>@endif
                @if($lead->utm_campaign)<p class="text-xs text-gray-500">Campaign : <strong class="text-gray-700">{{ $lead->utm_campaign }}</strong></p>@endif
            </div>
            @endif
            <div>
                <p class="text-xs text-gray-400">Consentement RGPD</p>
                <p class="text-sm font-semibold {{ $lead->consentement_rgpd ? 'text-green-600' : 'text-red-600' }}">
                    {{ $lead->consentement_rgpd ? '✅ Accepté' : '❌ Non accepté' }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
