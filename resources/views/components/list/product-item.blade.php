<div class="product ">
  <!--
  <div class="product-type">
    <h5 class="-new">New</h5>
    <h5 class="-sale">-15%</h5>
  </div>
  -->

  <div class="product-thumb">
    <a class="product-thumb__image" href="{{ URL($item->url) }}">
      @if (count($item->all_photos) > 1)
        @php
          $path = env('PATH_PRODUCT') .'/'. $item->slug .'/';
          $count = (count($item->all_photos) > 1) ? 2 : 1;
        @endphp
        @for ($i = 0; $i < $count; $i++)
          @if (File::isFile($path . $item->all_photos[$i]))
            <img
              src="{{ URL($path . $item->all_photos[$i]) }}"
              style="max-height: 265px; min-height: 262px;"
              alt="Product image"
            />
          @else
            <img
              src="{{ URL('img/no-image.png') }}"
              style="max-height: 265px; min-height: 262px;"
              alt="Product image"
            />
          @endif
        @endfor
      @else
        <img
          src="{{ URL('img/no-image.png') }}"
          style="max-height: 265px; min-height: 262px;"
          alt="Product image"
        />
      @endif
    </a>
  </div>

  <div class="product-content">
    <div class="product-content__header">
      <div class="product-category">
        {{ @$item->brand->name }}
      </div>
    </div>

    <a class="product-name" href="{{ URL($item->url) }}">
      {{ $item->name }}
    </a>

    <div class="product-content__footer">
      <h5 class="product-price--main">
        {{ @$item->category->name }}
      </h5>
    </div>
  </div>
</div>
