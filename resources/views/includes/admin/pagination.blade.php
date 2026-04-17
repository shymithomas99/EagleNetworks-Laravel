@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">&laquo;&nbsp;Previous</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;&nbsp;Previous</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;&nbsp;Next</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">&raquo;&nbsp;Next</span>
            </li>
        @endif
    </ul>
@endif
<style>
    .pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    border-radius: 0.25rem;
}

.page-item {
    margin: 0 0.25rem;
}

.page-item .page-link {
    color: #007bff;
    background-color: white;
    border: 1px solid #dee2e6;
    padding: 0.5rem 0.75rem;
    font-size: 16px;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.page-item .page-link:hover {
    background-color: #007bff;
    color: white;
    transform: scale(1.05);
}

.page-item.active .page-link {
    z-index: 1;
    color: white;
    background-color: #007bff;
    border-color: #007bff;
    cursor: default;
}

.page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    background-color: #fff;
    border-color: #dee2e6;
}

</style>
