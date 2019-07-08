@if ($paginator->lastPage() > 1)
<ul >
    <li>
        @if($paginator->currentPage() == 1)
            <span>&lt;</span>
        @else
            <a href="{{ $paginator->url(1) }}">&lt;</a>
        @endif
    </li>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
    @endfor
    <li>
        @if($paginator->currentPage() == $paginator->lastPage())
            <span>&gt;</span>
        @else
            <a href="{{ $paginator->url($paginator->currentPage()+1) }}" >&gt;</a>
        @endif

    </li>
</ul>
@endif
