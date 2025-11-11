@props(['paginator'])

@php
    $currentPage = $paginator->currentPage();
    $lastPage = $paginator->lastPage();
@endphp

<div class="flex justify-center mt-6 space-x-2">
    <!-- Previous -->
    @if($paginator->onFirstPage())
        <span class="px-3 py-1 bg-gray-200 rounded-md opacity-50"><</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 bg-gray-200 hover:bg-gray-300 rounded-md"><</a>
    @endif

    <!-- Pages -->
    @for ($i = 1; $i <= $lastPage; $i++)
        <a href="{{ $paginator->url($i) }}"
            class="px-3 py-1 {{ $currentPage == $i ? 'bg-blue-400 text-white' : 'bg-gray-200 text-black' }} rounded-md">{{ $i }}</a>
    @endfor

    <!-- Next -->
    @if($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 bg-gray-200 hover:bg-gray-300 rounded-md">></a>
    @else
        <span class="px-3 py-1 bg-gray-200 rounded-md opacity-50">></span>
    @endif
</div>
