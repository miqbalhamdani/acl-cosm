<div class="breadcrumb">
  <div class="container">
    <h2>{{ @$title }}</h2>

    <ul>
      @if(@$breadcrumbs)
      @foreach ($breadcrumbs as $key => $item)
      <li class="mb-3
        @if ($key == count($breadcrumbs) - 1)
          active
        @endif
      ">
        {{ $item }}
      </li>
      @endforeach
      @endif
    </ul>
  </div>
</div>
