@extends('admin.layouts.app')

@section('title', 'Leads')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-900">Leads — Landing Pages</h2>
        <a href="{{ route('admin.leads.export', request()->query()) }}" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-green-700 transition">Export CSV</a>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
        <div class="bg-white rounded-xl p-5 shadow-sm">
            <p class="text-xs text-gray-400 mb-1">Total</p>
            <p class="text-3xl font-bold text-brand-blue">{{ $stats['total'] }}</p>
        </div>
        <div class="bg-white rounded-xl p-5 shadow-sm">
            <p class="text-xs text-gray-400 mb-1">Nouveaux</p>
            <p class="text-3xl font-bold text-yellow-600">{{ $stats['nouveau'] }}</p>
        </div>
        <div class="bg-white rounded-xl p-5 shadow-sm">
            <p class="text-xs text-gray-400 mb-1">Contactés</p>
            <p class="text-3xl font-bold text-blue-600">{{ $stats['contacte'] }}</p>
        </div>
        <div class="bg-white rounded-xl p-5 shadow-sm">
            <p class="text-xs text-gray-400 mb-1">Convertis</p>
            <p class="text-3xl font-bold text-green-600">{{ $stats['converti'] }}</p>
        </div>
        <div class="bg-white rounded-xl p-5 shadow-sm">
            <p class="text-xs text-gray-400 mb-1">Perdus</p>
            <p class="text-3xl font-bold text-red-600">{{ $stats['perdu'] }}</p>
        </div>
    </div>

    {{-- Filtres --}}
    <div class="bg-white rounded-xl p-5 shadow-sm">
        <form method="GET" action="{{ route('admin.leads.index') }}" class="flex flex-wrap gap-3 items-end">
            <div>
                <label class="block text-xs text-gray-400 mb-1">Recherche</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Nom, email, tel..." class="px-3 py-2 border border-gray-300 rounded-lg text-sm w-44 focus:ring-brand-blue focus:border-brand-blue">
            </div>
            <div>
                <label class="block text-xs text-gray-400 mb-1">Page</label>
                <select name="page_source" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-brand-blue focus:border-brand-blue">
                    <option value="">Toutes</option>
                    <option value="P1" {{ request('page_source') === 'P1' ? 'selected' : '' }}>P1 — EDL Expert</option>
                    <option value="P2" {{ request('page_source') === 'P2' ? 'selected' : '' }}>P2 — App EDL</option>
                    <option value="P3" {{ request('page_source') === 'P3' ? 'selected' : '' }}>P3 — Investissement</option>
                    <option value="P4" {{ request('page_source') === 'P4' ? 'selected' : '' }}>P4 — Défiscalisation</option>
                </select>
            </div>
            <div>
                <label class="block text-xs text-gray-400 mb-1">Statut</label>
                <select name="statut" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-brand-blue focus:border-brand-blue">
                    <option value="">Tous</option>
                    <option value="nouveau" {{ request('statut') === 'nouveau' ? 'selected' : '' }}>Nouveau</option>
                    <option value="contacte" {{ request('statut') === 'contacte' ? 'selected' : '' }}>Contacté</option>
                    <option value="converti" {{ request('statut') === 'converti' ? 'selected' : '' }}>Converti</option>
                    <option value="perdu" {{ request('statut') === 'perdu' ? 'selected' : '' }}>Perdu</option>
                </select>
            </div>
            <div>
                <label class="block text-xs text-gray-400 mb-1">Du</label>
                <input type="date" name="date_from" value="{{ request('date_from') }}" class="px-3 py-2 border border-gray-300 rounded-lg text-sm">
            </div>
            <div>
                <label class="block text-xs text-gray-400 mb-1">Au</label>
                <input type="date" name="date_to" value="{{ request('date_to') }}" class="px-3 py-2 border border-gray-300 rounded-lg text-sm">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-brand-blue text-white px-4 py-2 rounded-lg text-sm font-semibold hover:opacity-90 transition">Filtrer</button>
                <a href="{{ route('admin.leads.index') }}" class="bg-gray-200 text-gray-600 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-300 transition">Reset</a>
            </div>
        </form>
    </div>

    {{-- Tableau --}}
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b-2 border-gray-200">
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase">Date</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase">Page</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase">Prénom</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase">Téléphone</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase">Email</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase">Statut</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($leads as $lead)
                    @php
                        $pageColors = ['P1' => 'bg-blue-900', 'P2' => 'bg-purple-600', 'P3' => 'bg-green-700', 'P4' => 'bg-green-700'];
                        $pageLabels = ['P1' => 'EDL', 'P2' => 'App EDL', 'P3' => 'Invest.', 'P4' => 'Défisca.'];
                    @endphp
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-gray-500 whitespace-nowrap">{{ $lead->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-3">
                            <span class="{{ $pageColors[$lead->page_source] ?? 'bg-gray-500' }} text-white px-2 py-0.5 rounded text-xs font-semibold">
                                {{ $pageLabels[$lead->page_source] ?? $lead->page_source }}
                            </span>
                        </td>
                        <td class="px-4 py-3 font-medium">{{ $lead->prenom }}</td>
                        <td class="px-4 py-3"><a href="tel:{{ $lead->telephone }}" class="text-blue-600 hover:underline">{{ $lead->telephone }}</a></td>
                        <td class="px-4 py-3"><a href="mailto:{{ $lead->email }}" class="text-blue-600 hover:underline">{{ $lead->email }}</a></td>
                        <td class="px-4 py-3">
                            <form method="POST" action="{{ route('admin.leads.statut', $lead) }}">
                                @csrf
                                @method('PATCH')
                                <select name="statut" onchange="this.form.submit()" class="text-xs font-semibold px-2 py-1 rounded border-0 cursor-pointer
                                    {{ $lead->statut === 'nouveau' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                    {{ $lead->statut === 'contacte' ? 'bg-blue-100 text-blue-700' : '' }}
                                    {{ $lead->statut === 'converti' ? 'bg-green-100 text-green-700' : '' }}
                                    {{ $lead->statut === 'perdu' ? 'bg-red-100 text-red-700' : '' }}
                                ">
                                    <option value="nouveau" {{ $lead->statut === 'nouveau' ? 'selected' : '' }}>Nouveau</option>
                                    <option value="contacte" {{ $lead->statut === 'contacte' ? 'selected' : '' }}>Contacté</option>
                                    <option value="converti" {{ $lead->statut === 'converti' ? 'selected' : '' }}>Converti</option>
                                    <option value="perdu" {{ $lead->statut === 'perdu' ? 'selected' : '' }}>Perdu</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('admin.leads.show', $lead) }}" class="text-blue-600 hover:underline text-xs font-medium">Détail →</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-10 text-center text-gray-400">Aucun lead.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($leads->hasPages())
        <div class="mt-4">{{ $leads->links() }}</div>
    @endif
</div>
@endsection
