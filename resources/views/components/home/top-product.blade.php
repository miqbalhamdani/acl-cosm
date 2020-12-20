
@if (count($topProducts) > 1)
<div class="product-tab -style-1">
  <div class="container">
    <div class="section-title -center" style="margin-bottom: 1.875em">
      <h2>In-house Brand</h2>
      <img src="{{ URL('fe/images/introduction/IntroductionOne/content-deco.png') }}" alt="Decoration"/>
    </div>

    <div class="product-tab__header">
      <ul
        class="nav nav-pills"
        id="top-product-tab"
        role="tablist"
      >
        @foreach ($topProducts as $index => $item)
        <li
          class="nav-item @if($index == 0) active @endif"
          role="presentation"
        >
          <a
            class="nav-link"
            id="top-product-{{ $index }}-tab"
            data-toggle="pill"
            href="#top-product-{{ $index }}"
            role="tab"
            aria-controls="top-product-{{ $index }}"
            aria-selected="true"
          >
            {{ $item->name }}
          </a>
        </li>
        @endforeach
      </ul>
    </div>

    <div class="product-tab__content">
      <div
        class="product-tab__content__wrapper tab-content"
        id="top-product-tabContent"
      >
        @foreach ($topProducts as $index => $item)
        <div
          class="row mx-n1 mx-lg-n3 tab-pane fade @if ($index == 0) active in @endif"
          id="top-product-{{ $index }}"
          role="tabpanel"
          aria-labelledby="top-product-{{ $index }}-tab"
        >
          @foreach ($item->list_product as $product)
          <div class="col-sm-12 col-md-4 col-lg-3 px-1 px-lg-3">
            @include('components.list.product-item', ['item' => $product])
          </div>
          @endforeach
        </div>
        @endforeach
      </div>

      <div class="text-center">
        <a
          class="btn -transparent -underline"
          href="{{ route('product-list') }}"
        >
          View all product
        </a>
      </div>
    </div>
  </div>
</div>
@endif

@push('javascript')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endpush

@push('css')
<style>
.product-tab.-style-1 .product-tab__header ul {
  display: flex;
  justify-content: center;
}

.product-tab.-style-1 .nav-pills>li.active>a,
.product-tab.-style-1 .nav>li>a:focus,
.product-tab.-style-1 .nav>li>a:hover {
  background-color: transparent;
}
</style>
@endpush
