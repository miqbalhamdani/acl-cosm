<div class="col-12 col-sm-6 col-lg-4">
  <div class="product ">
    <!--
    <div class="product-type">
      <h5 class="-new">New</h5>
      <h5 class="-sale">-15%</h5>
    </div>
    -->

    <div class="product-thumb">
      <a class="product-thumb__image" href="{{ URL($item->url) }}">
        @php
          $path = env('PATH_PRODUCT') .'/'. $item->slug .'/';
        @endphp
        @for ($i = 0; $i < 2; $i++)
          <img src="{{ URL($path . $item->all_photos[$i]) }}" alt="Product image"/>
        @endfor
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
</div>
