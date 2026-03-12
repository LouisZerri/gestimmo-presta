@extends('admin.layouts.app')

@section('title', 'Avis clients')
@section('header', 'Gestion des avis clients')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-600">{{ $testimonials->count() }} avis au total</p>
    <a href="{{ route('admin.testimonials.create') }}"
       class="bg-brand-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Ajouter un avis
    </a>
</div>

@foreach($pages as $pageKey => $pageLabel)
    @php $pageTestimonials = $testimonials->where('page', $pageKey); @endphp
    @if($pageTestimonials->count() > 0)
        <div class="mb-8">
            <h3 class="text-lg font-bold text-gray-700 mb-3 flex items-center gap-2">
                <span class="w-3 h-3 bg-brand-blue rounded-full"></span>
                Page : {{ $pageLabel }}
                <span class="text-sm font-normal text-gray-400">({{ $pageTestimonials->count() }})</span>
            </h3>
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left px-6 py-3 text-xs font-medium text-gray-500 uppercase">Ordre</th>
                            <th class="text-left px-6 py-3 text-xs font-medium text-gray-500 uppercase">Nom</th>
                            <th class="text-left px-6 py-3 text-xs font-medium text-gray-500 uppercase">Avis</th>
                            <th class="text-left px-6 py-3 text-xs font-medium text-gray-500 uppercase">Note</th>
                            <th class="text-left px-6 py-3 text-xs font-medium text-gray-500 uppercase">Statut</th>
                            <th class="text-left px-6 py-3 text-xs font-medium text-gray-500 uppercase">IA</th>
                            <th class="text-right px-6 py-3 text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($pageTestimonials as $testimonial)
                            <tr class="hover:bg-gray-50 transition" id="row-{{ $testimonial->id }}">
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $testimonial->sort_order }}</td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-800">{{ $testimonial->name }}</div>
                                    <div class="text-xs text-gray-400">{{ $testimonial->location }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-600 max-w-md truncate" id="content-{{ $testimonial->id }}">
                                        {{ Str::limit($testimonial->content, 100) }}
                                    </p>
                                    @if($testimonial->original_content)
                                        <p class="text-xs text-amber-500 mt-1">
                                            <svg class="w-3 h-3 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                            </svg>
                                            Reformulé par IA
                                        </p>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex text-yellow-400 text-xs">
                                        @for($i = 0; $i < $testimonial->rating; $i++)
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        @endfor
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($testimonial->is_published)
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Publié</span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">Brouillon</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <button onclick="reformulate({{ $testimonial->id }})"
                                            class="reformulate-btn inline-flex items-center gap-1 px-3 py-1.5 bg-purple-50 text-purple-700 rounded-lg hover:bg-purple-100 transition text-xs font-medium"
                                            id="ai-btn-{{ $testimonial->id }}">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                        <span>Reformuler</span>
                                    </button>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                                           class="text-blue-600 hover:text-blue-800 text-sm">Modifier</a>
                                        <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                                              onsubmit="return confirm('Supprimer cet avis ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endforeach
@endsection

@push('scripts')
<script>
async function reformulate(id) {
    const btn = document.getElementById('ai-btn-' + id);
    const originalHtml = btn.innerHTML;

    btn.disabled = true;
    btn.innerHTML = `<svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg> <span>IA en cours...</span>`;

    try {
        const response = await fetch(`/admin/testimonials/${id}/reformulate`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            }
        });

        const data = await response.json();

        if (data.success) {
            btn.innerHTML = `<svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> <span class="text-green-700">Reformulé !</span>`;
            btn.classList.remove('bg-purple-50', 'text-purple-700');
            btn.classList.add('bg-green-50');

            // Refresh after 1.5s
            setTimeout(() => location.reload(), 1500);
        } else {
            throw new Error(data.error || 'Erreur inconnue');
        }
    } catch (error) {
        btn.innerHTML = originalHtml;
        btn.disabled = false;
        alert('Erreur : ' + error.message);
    }
}
</script>
@endpush
