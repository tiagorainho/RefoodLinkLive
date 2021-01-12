@if ($paginator->hasPages())
    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><a class="page-link"><span>1</span></a></li>
                <li class="page-item disabled"><a class="page-link"><span>«</span></a></li>
            @else
                <li wire:click="gotoPage(1)" class="page-item"><a class="page-link"><span>1</span></a></li>
                <li wire:click="previousPage" class="page-item"><a class="page-link"><span>«</span></a></li>
            @endif

            <li class="page-item active"><a class="page-link">{{ $paginator->currentPage() }}</a></li>

            @if ($paginator->hasMorePages())
                <li wire:click="nextPage" class="page-item"><a class="page-link"><span>»</span></a></li>
                <li wire:click="gotoPage({{ $paginator->lastPage() }})" class="page-item"><a class="page-link"><span>{{ $paginator->lastPage() }}</span></a></li>
            @else
                <li class="page-item disabled"><a class="page-link"><span>»</span></a></li>
                <li class="page-item disabled"><a class="page-link"><span>{{ $paginator->lastPage() }}</span></a></li>
            @endif
        </ul>
    </nav>
@endif