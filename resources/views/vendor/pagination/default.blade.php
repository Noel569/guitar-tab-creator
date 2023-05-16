@if ($paginator->hasPages())
    <nav>
        <div class="pagination">
            @if ($paginator->onFirstPage())
                <div class="page-nav disabled" aria-disabled="true">Previous</div>
            @else
                <a class="page-nav" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
            @endif

            <div class="number-wrapper">
                @foreach ($elements as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="page-number current">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="page-number" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            @if ($paginator->hasMorePages())
                <a class="page-nav" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
            @else
                <div class="page-nav disabled" aria-disabled="true">Next</div>
            @endif
        </div>
    </nav>
@endif
