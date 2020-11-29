<div class="product-slide">
  <div class="container">
    <div class="section-title -center" style="margin-bottom: 1.875em">
      <h2>Related product</h2>
    </div>

    <div class="product-slider">
      <div class="product-slide__wrapper">
        @foreach ($relatedProducts as $item)
          <div class="product-slide__item">
            @include('components.list.product-item', ['item' => $item])
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
