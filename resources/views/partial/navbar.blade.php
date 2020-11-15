@php
$style = '-style-3';
$class = '-white';
$logo = '';

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
        <img src="{{ URL('fe/images/logo' .$class. '.png') }}" alt="Logo" />
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
                <a href="#">
                  Company Profile
                </a>
              </li>

              <li>
                <a href="#">
                  Sertifikat
                </a>
              </li>
            </ul>
          </li>

          <li>
            <a href="#">
              Layanan
            </a>
          </li>

          <li>
            <a href="">
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
                @foreach ($categories as $category)
                  @if (!$category->parent_id)
                  <ul class="dropdown-menu__col">
                    <li class="title">
                      {{ $category->name }}
                    </li>

                    @foreach ($category->child as $subcategory)
                    <li>
                      <a href="#">
                        {{ $subcategory->name }}
                      </a>
                    </li>
                    @endforeach
                  </ul>
                  @endif
                @endforeach
              </div>

              <div class="col-3">
                <ul class="dropdown-menu__col">
                  <li class="title">
                    Brands
                  </li>

                  @foreach ($brands as $brand)
                  <li>
                    <a href="#">
                      {{ $brand->name }}
                    </a>
                  </li>
                  @endforeach
                </ul>
              </div>
            </ul>
          </li>

          <li>
            <a href="#">
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
          <form>
            <input type="text" placeholder="What are you looking for?" name="search" />
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
</style>
@endpush
