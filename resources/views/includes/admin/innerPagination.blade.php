<div class="common-pagination d-flex justify-content-center mt-3 mb-5">
    @if ($paginator->hasPages())
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link"><i class="bi bi-chevron-left"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i
                            class="bi bi-chevron-left"></i></a>
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
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i
                            class="bi bi-chevron-right"></i></a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link"><i class="bi bi-chevron-right"></i></span>
                </li>
            @endif
        </ul>
    @endif
</div>
<style>
    .common-pagination {
        margin-top: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .pagination {
        display: flex;
        gap: 8px;
        padding-left: 0;
        list-style: none;
    }

    .page-item .page-link {
        color: #f1de31;
        background-color: #ffffff;
        border: 1.5px solid #f1de31;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        font-size: 15px;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.25s ease;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
    }

    /* Hover */
    .page-item:not(.active):not(.disabled) .page-link:hover {
        background-color: #f1de31;
        color: #000;
        transform: translateY(-1px);
        box-shadow: 0 3px 8px rgba(241, 222, 49, 0.45);
    }

    /* Active */
    .page-item.active .page-link {
        background-color: #f1de31;
        color: #000;
        border-color: #f1de31;
        box-shadow: 0 3px 8px rgba(241, 222, 49, 0.55);
        cursor: default;
    }

    /* Disabled */
    .page-item.disabled .page-link {
        color: #cfcfcf;
        border-color: #ddd;
        background-color: #fafafa;
        box-shadow: none;
        cursor: not-allowed;
    }

    /* Icons */
    .page-link i {
        font-size: 14px;
    }
</style>
