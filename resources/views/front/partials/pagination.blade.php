@if ($paginator->hasPages())
    <nav class="pagination-container">
        <ul class="pagination-list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pagination-item disabled">
                    <span class="pagination-link prev-next">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                </li>
            @else
                <li class="pagination-item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="pagination-link prev-next">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
            @endif

            {{-- First Page Link --}}
            @if($paginator->currentPage() > 3)
                <li class="pagination-item">
                    <a href="{{ $paginator->url(1) }}" class="pagination-link">1</a>
                </li>
                @if($paginator->currentPage() > 4)
                    <li class="pagination-item dots">
                        <span class="pagination-link">...</span>
                    </li>
                @endif
            @endif

            {{-- Pagination Elements --}}
            @foreach(range(max(1, $paginator->currentPage() - 2), min($paginator->lastPage(), $paginator->currentPage() + 2)) as $page)
                @if ($page == $paginator->currentPage())
                    <li class="pagination-item">
                        <span class="pagination-link active">{{ $page }}</span>
                    </li>
                @else
                    <li class="pagination-item">
                        <a href="{{ $paginator->url($page) }}" class="pagination-link">{{ $page }}</a>
                    </li>
                @endif
            @endforeach

            {{-- Last Page Link --}}
            @if($paginator->currentPage() < $paginator->lastPage() - 2)
                @if($paginator->currentPage() < $paginator->lastPage() - 3)
                    <li class="pagination-item dots">
                        <span class="pagination-link">...</span>
                    </li>
                @endif
                <li class="pagination-item">
                    <a href="{{ $paginator->url($paginator->lastPage()) }}" class="pagination-link">{{ $paginator->lastPage() }}</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="pagination-link prev-next">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="pagination-item disabled">
                    <span class="pagination-link prev-next">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
