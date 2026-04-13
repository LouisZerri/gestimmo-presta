@extends('admin.layouts.app')

@section('title', 'Demandes de rappel')

@section('content')
<div class="space-y-6">
    <h2 class="text-2xl font-bold text-gray-900">Demandes de rappel — Chatbot</h2>

    {{-- Stats --}}
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <div class="bg-white rounded-xl p-5 shadow-sm">
            <p class="text-xs text-gray-400 mb-1">Total</p>
            <p class="text-3xl font-bold text-brand-blue">{{ $stats['total'] }}</p>
        </div>
        <div class="bg-white rounded-xl p-5 shadow-sm">
            <p class="text-xs text-gray-400 mb-1">Nouvelles</p>
            <p class="text-3xl font-bold text-yellow-600">{{ $stats['nouveau'] }}</p>
        </div>
        <div class="bg-white rounded-xl p-5 shadow-sm">
            <p class="text-xs text-gray-400 mb-1">Traitées</p>
            <p class="text-3xl font-bold text-green-600">{{ $stats['traite'] }}</p>
        </div>
    </div>

    {{-- Tableau --}}
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b-2 border-gray-200">
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase">Date</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase">Page</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase">Contact</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase">Statut</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($callbacks as $cb)
                    @php
                        $pageColors = ['P1' => 'bg-blue-900', 'P2' => 'bg-purple-600'];
                        $pageLabels = ['P1' => 'EDL Expert', 'P2' => 'App EDL'];
                    @endphp
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-gray-500 whitespace-nowrap">{{ $cb->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-3">
                            <span class="{{ $pageColors[$cb->page_source] ?? 'bg-gray-500' }} text-white px-2 py-0.5 rounded text-xs font-semibold">
                                {{ $pageLabels[$cb->page_source] ?? $cb->page_source }}
                            </span>
                        </td>
                        <td class="px-4 py-3 font-medium">
                            @if(str_contains($cb->contact, '@'))
                                <a href="mailto:{{ $cb->contact }}" class="text-blue-600 hover:underline">{{ $cb->contact }}</a>
                            @else
                                <a href="tel:{{ $cb->contact }}" class="text-blue-600 hover:underline">{{ $cb->contact }}</a>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <form method="POST" action="{{ route('admin.callbacks.statut', $cb) }}">
                                @csrf
                                @method('PATCH')
                                <select name="statut" onchange="this.form.submit()" class="text-xs font-semibold px-2 py-1 rounded border-0 cursor-pointer
                                    {{ $cb->statut === 'nouveau' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                    {{ $cb->statut === 'traite' ? 'bg-green-100 text-green-700' : '' }}
                                ">
                                    <option value="nouveau" {{ $cb->statut === 'nouveau' ? 'selected' : '' }}>Nouveau</option>
                                    <option value="traite" {{ $cb->statut === 'traite' ? 'selected' : '' }}>Traité</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-10 text-center text-gray-400">Aucune demande de rappel.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($callbacks->hasPages())
        <div class="mt-4">{{ $callbacks->links() }}</div>
    @endif
</div>
@endsection
