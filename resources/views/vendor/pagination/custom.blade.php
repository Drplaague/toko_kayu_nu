 @if ($paginator->hasPages())
    <ul class="pagination justify-content-center justify-content-lg-end pager">
        @if ($paginator->onFirstPage())
        <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous" rel="prev">
            <span aria-hidden="true">«</span></a></li>
            
            @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous" rel="prev">
                <span aria-hidden="true">«</span></a></li>
        @endif

        @foreach ($elements as $element)


        @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active my-active page-item"><a class="page-link" href="{{ $url }}"><span>{{ $page }}</span></a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next" rel="next"><span aria-hidden="true">»</span></a></li>
            @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next" rel="next"><span aria-hidden="true">»</span></a></li>
            @endif
    </ul>
    @endif 