<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="btn btn-secondary shadow">
                    {!! __('pagination.previous') !!}
                </button>
            @else
                <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="btn btn-primary shadow">
                    {!! __('pagination.previous') !!}
                </button>
            @endif         

            <!-- Pagination Elements -->
            @foreach ($elements as $element)
                <!-- Array Of Links -->
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <!--  Use three dots when current page is greater than 3.  -->
                        @if ($paginator->currentPage() > 3 && $page === 2)
                            ...
                        @endif

                        <!--  Show active page two pages before and after it.  -->
                        @if ($page == $paginator->currentPage())
                            <span class="btn btn-sm btn-secondary me-1">{{ $page }}</span>
                        @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2)
                            <a class="btn btn-primary shadow btn-sm me-1" wire:click="gotoPage({{$page}})">{{ $page }}</a>
                        @endif

                        <!--  Use three dots when current page is away from end.  -->
                        @if ($paginator->currentPage() < $paginator->lastPage() - 2  && $page === $paginator->lastPage() - 1)
                            ...
                        @endif
                    @endforeach
                @endif
            @endforeach
            
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="btn btn-primary shadow">
                    {!! __('pagination.next') !!}
                </button>
            @else
                <button class="btn btn-secondary shadow">
                    {!! __('pagination.next') !!}
                </button>
            @endif
        </nav>
    @endif
</div>