<div class="product ">
  <!--
  <div class="product-type">
    <h5 class="-new">New</h5>
    <h5 class="-sale">-15%</h5>
  </div>
  -->

  <div class="product-thumb">
    <a class="product-thumb__image" href="{{ URL($item->url) }}">
      <!-- NO IMAGE -->
      @if (count($item->all_photos) < 1)
        <img
          src="{{ URL('img/no-image.png') }}"
          style="max-height: 265px; min-height: 262px;"
          alt="Product image"
        />
      @endif

      @php
        $path = env('PATH_PRODUCT') .'/'. $item->slug .'/';
      @endphp

      <!-- ONE IMAGE -->
      @if (count($item->all_photos) === 1)
        @php
          $imageOne =  File::isFile($path . $item->all_photos[0])
              ? $path . $item->all_photos[0]
              : 'img/no-image.png';
        @endphp

        <img
          src="{{ URL($imageOne) }}"
          style="max-height: 265px; min-height: 262px;"
          alt="Product image"
        />
      @endif

      <!-- TWO IMAGE -->
      @if (count($item->all_photos) > 1)
        @php
          $imageTwo =  File::isFile($path . $item->all_photos[0])
              ? $path . $item->all_photos[0]
              : 'img/no-image.png';
        @endphp

        @if (File::isFile($path . $item->all_photos[1]))
        <img
          src="{{ URL($path . $item->all_photos[1]) }}"
          style="max-height: 265px; min-height: 262px;"
          alt="Product image"
        />
        @endif

        <img
          src="{{ URL($imageTwo) }}"
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
