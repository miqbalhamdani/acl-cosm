@php
$style = '-style-3';
$class = '-white';
$logo = 'menu-header';

if (Route::current()->getName() == 'home') {
  $style = '-style-1';
  $class = '';
  $logo = 'menu-logo';
}
@endphp

<div class="menu {{ $style }}">
  <div class="container">
    <div class="menu__wrapper">
      <a class="{{ $logo }}" href="{{ route('home') }}">
        <img src="{{ URL('img/logo/logo.png') }}" alt="Logo"/>
        <span>Aulia Citra Lestari</span>
      </a>

      <div class="navigator {{ $class }}">
        <ul>
          <li>
            <a href="{{ route('home') }}">
              Home
            </a>
          </li>

          <li class="relative">
            <a href="">
              About
              <span class="dropable-icon">
                <i class="fas fa-angle-down"></i>
              </span>
            </a>

            <ul class="dropdown-menu">
              <li>
                <a href="{{ route('company-profile') }}">
                  Company Profile
                </a>
              </li>

              <li>
                <a href="{{ route('sertifikasi') }}">
                  Sertifikasi
                </a>
              </li>
            </ul>
          </li>

          <li>
            <a href="{{ route('layanan') }}">
              Layanan
            </a>
          </li>

          <li>
            <a href="{{ route('product-list') }}">
              In-house Brand
              <span class="dropable-icon">
                <i class="fas fa-angle-down"></i>
              </span>
            </a>

            <ul class="dropdown-menu -wide d-flex">
              @php
                $categories = Cache::get('product-categories');
                $brands = Cache::get('product-brands');
              @endphp

              <div class="col-9" style="display: grid; grid-template-columns: 1fr 1fr 1fr;">
                @if(Cache::has('product-categories'))
                @foreach ($categories as $category)
                  @if (!$category->parent_id)
                  <ul class="dropdown-menu__col">
                    <li class="title">
                      {{ $category->name }}
                    </li>

                    @foreach ($category->child as $subcategory)
                    <li>
                      <a href="{{ route('product-list', [
                        'category' => $subcategory->slug,
                      ]) }}">
                        {{ $subcategory->name }}
                      </a>
                    </li>
                    @endforeach
                  </ul>
                  @endif
                @endforeach
                @endif
              </div>

              <div class="col-3">
                <ul class="dropdown-menu__col">
                  <li class="title">
                    Brands
                  </li>

                  @if(Cache::has('product-brands'))
                  @foreach ($brands as $brand)
                  <li>
                    <a href="{{ route('product-list', [
                      'brands' => $brand->slug,
                    ]) }}">
                      {{ $brand->name }}
                    </a>
                  </li>
                  @endforeach
                  @endif
                </ul>
              </div>
            </ul>
          </li>

          <li>
            <a href="{{ route('contact') }}">
              Kontak
            </a>
          </li>
        </ul>
      </div>

      <div class="menu-functions {{ $class }}">
        <a class="menu-icon -search" href="#">
          <img src="{{ URL('fe/images/header/search-icon' .$class. '.png') }}" alt="Search icon" />
        </a>

        <div class="search-box">
          <form method="GET" action="{{ route('product-list') }}">
            <input
              type="text"
              placeholder="What are you looking for?"
              name="search"
              value="{{ @$input['search'] }}"
            />
            <button>
              <img src="{{ URL('fe/images/header/search-icon.png') }}" alt="Search icon" /></button>
          </form>
        </div>

        <a class="menu-icon -navbar" href="#">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </a>
      </div>
    </div>
  </div>
</div>


@push('css-body')
<style>
.menu__wrapper .navigator > ul > li .dropdown-menu li.title {
  margin-bottom: 10px;
  font-size: 19px;
  font-weight: bold;
}

.-style-1 .menu__wrapper .menu-logo,
.-style-3 .menu__wrapper .menu-header {
  display: flex;
  align-items: center;
  text-decoration: none;
}
.-style-1 .menu__wrapper .menu-logo img,
.-style-3 .menu__wrapper .menu-header img {
  height: 70px;
  width: auto;
}
.-style-1 .menu__wrapper .menu-logo span,
.-style-3 .menu__wrapper .menu-header span {
  padding-left: 1rem;
  font-weight: 600;
  font-size: 20px;
  color: #008135;
}

</style>
@endpush
