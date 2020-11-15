<div class="shop-sidebar__section -refine">
  <div class="section-title -style1 -medium" style="margin-bottom:1.875em">
    <h2>Brand</h2>
    <img src="{{ URL('fe/images/introduction/IntroductionOne/content-deco.png') }}" alt="Decoration"/>
  </div>

  <div class="shop-sidebar__section__item">
    <ul>
      @foreach ($brands as $item)
        <li>
          <a href="">
            <label for="brand-{{ $item->slug }}">
              <input
                type="checkbox"
                name="{{ $item->slug }}"
                id="brand-{{ $item->slug }}"
              />
                {{ $item->name }}
            </label>
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</div>

@push('css')
<style>
.shop-sidebar__section__item li a {
  text-decoration: none;
}
</style>
@endpush
