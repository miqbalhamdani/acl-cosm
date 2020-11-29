<div class="shop-sidebar__section -refine">
  <div class="section-title -style1 -medium" style="margin-bottom:1.875em">
    <h2>Brand</h2>
    <img src="{{ URL('fe/images/introduction/IntroductionOne/content-deco.png') }}" alt="Decoration"/>
  </div>

  <div class="shop-sidebar__section__item">
    <ul>
      @if(Cache::has('product-brands'))
      @foreach ($brands as $item)
        <li>
          @php
            $url = generateBrandUrl($item->slug);
          @endphp
          <a
            href="#"
            onclick="filterBrandsRedirect('{{$url}}')"
          >
            <label for="brand-{{ $item->slug }}">
              @php
                $dataBrands = app('request')->input('brands');
                $arrBrands = explode(",", $dataBrands);
              @endphp

              <input
                type="checkbox"
                name="{{ $item->slug }}"
                id="brand-{{ $item->slug }}"
                @if (in_array($item->slug, $arrBrands))
                  checked
                @endif
              />
                {{ $item->name }}
            </label>
          </a>
        </li>
      @endforeach
      @endif
    </ul>
  </div>
</div>

@push('javascript')
<script>
function filterBrandsRedirect(url) {
  event.preventDefault();
  window.location.href = url;
}
</script>
@endpush

@push('css')
<style>
.shop-sidebar__section__item li a {
  text-decoration: none;
}
</style>
@endpush
