@if ($paginations->lastPage() > 1)
<ul class="paginator">

  <!-- Previous -->
  @if($paginations->currentPage() != 1)
  <li class="page-item">
    <a href="{{ $paginations->url(1) }}">
      <button class="page-link">
        <i class="far fa-angle-left"></i>
      </button>
    </a>
  </li>
  @endif

  @for ($i = 1; $i <= $paginations->lastPage(); $i++)
  <li class="
    page-item
    @if($paginations->currentPage() == $i) active @endif
  ">
    <a href="{{ $paginations->url($i) }}">
      <button class="page-link">
        {{ $i }}
      </button>
    </a>
  </li>
  @endfor

  <!-- Next -->
  @if($paginations->currentPage() != $paginations->lastPage())
  <li class="page-item">
    <a href="{{ $paginations->url($paginations->currentPage()+1) }}">
      <button class="page-link">
        <i class="far fa-angle-right"></i>
      </button>
    </a>
  </li>
  @endif

</ul>
@endif
