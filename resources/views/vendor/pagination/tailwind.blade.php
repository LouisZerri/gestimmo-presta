@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex items-center justify-center gap-1">
        {{-- Précédent --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-gray-300 cursor-not-allowed">
                <i class="fas fa-chevron-left"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" 
                class="px-4 py-2 text-gray-600 hover:text-brand-blue transition">
                <i class="fas fa-chevron-left"></i>
            </a>
        @endif

        {{-- Numéros de page --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-3 py-2 text-gray-400">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 bg-brand-blue text-white rounded-lg font-bold">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" 
                            class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg transition">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Suivant --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" 
                class="px-4 py-2 text-gray-600 hover:text-brand-blue transition">
                <i class="fas fa-chevron-right"></i>
            </a>
        @else
            <span class="px-4 py-2 text-gray-300 cursor-not-allowed">
                <i class="fas fa-chevron-right"></i>
            </span>
        @endif
    </nav>
@endif