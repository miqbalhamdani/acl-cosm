<div class="drawer drawer-right slide" id="mobile-menu-drawer" tabindex="-1" role="dialog" aria-labelledby="drawer-demo-title" aria-hidden="true">
  <div class="drawer-content drawer-content-scrollable" role="document">
    <div class="drawer-body">
      <div class="cart-sidebar">
        <div class="cart-items__wrapper">
          <div class="navigation-sidebar">
            <div class="search-box">
              <form method="GET" action="{{ route('product-list') }}">
                <input
                  type="text"
                  placeholder="What are you looking for?"
                  name="search"
                  value="{{ @$input['search'] }}"
                />
                <button>
                  <img src="{{ URL('fe/images/header/search-icon.png') }}" alt="Search icon"/>
                </button>
              </form>
            </div>

            <div class="navigator-mobile">
              <ul>
                <li><a href="{{ route('home') }}">Home</a></li>

                <li class="relative">
                  <a class="dropdown-menu-controller" href="#">
                    About
                    <span class="dropable-icon">
                      <i class="fas fa-angle-down"></i>
                    </span>
                  </a>

                  <ul class="dropdown-menu">
                    <li><a href="{{ route('company-profile') }}">Company Profile</a></li>
                    <li><a href="{{ route('sertifikasi') }}">Sertifikasi</a></li>
                  </ul>
                </li>

                <li><a href="{{ route('layanan') }}">Layanan</a></li>

                <!-- IN HOUSE BRAND -->
                <li>
                  <a class="dropdown-menu-controller" href="#">
                    In-house Brand
                    <span class="dropable-icon">
                      <i class="fas fa-angle-down"></i>
                    </span>
                  </a>

                  @php
                    $categories = Cache::get('product-categories');
                    $brands = Cache::get('product-brands');
                  @endphp

                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-menu-controller" href="#">
                        Brands
                        <span class="dropable-icon">
                          <i class="fas fa-angle-down"></i>
                        </span>
                      </a>

                      <ul class="dropdown-menu">
                        @foreach ($brands as $brand)
                        <li><a href="{{ route('product-list', ['brands' => $brand->slug]) }}">
                          {{ $brand->name }}
                        </a></li>
                        @endforeach
                      </ul>
                    </li>

                    <li>
                      @foreach ($categories as $category)
                      @if (!$category->parent_id)

                      <a class="dropdown-menu-controller" href="#">
                        {{ $category->name }}
                        <span class="dropable-icon">
                          <i class="fas fa-angle-down"></i>
                        </span>
                      </a>

                      <ul class="dropdown-menu">
                        @foreach ($category->child as $subcategory)
                        <li><a href="{{ route('product-list', ['category' => $subcategory->slug]) }}">
                          {{ $subcategory->name }}
                        </a></li>
                        @endforeach
                      </ul>

                      @endif
                      @endforeach
                    </li>
                  </ul>

                  {{-- <ul class="dropdown-menu">
                    <ul class="dropdown-menu__col">
                      <li><a href="shop-fullwidth-4col.html">Shop Fullwidth 4 Columns</a></li>
                      <li><a href="shop-fullwidth-5col.html">Shop Fullwidth 5 Columns</a></li>
                      <li><a href="shop-fullwidth-left-sidebar.html">Shop Fullwidth Left Sidebar</a></li>
                      <li><a href="shop-fullwidth-right-sidebar.html">Shop Fullwidth Right Sidebar</a></li>
                    </ul>

                    <ul class="dropdown-menu__col">
                      <li><a href="shop-grid-4col.html">Shop grid 4 Columns</a></li>
                      <li><a href="shop-grid-3col.html">Shop Grid 3 Columns</a></li>
                      <li><a href="shop-grid-sidebar.html">Shop Grid Sideber</a></li>
                      <li><a href="shop-list-sidebar.html">Shop List Sidebar</a></li>
                    </ul>

                    <ul class="dropdown-menu__col">
                      <li><a href="#">Product Detail</a></li>
                      <li><a href="cart.html">Shopping cart</a></li>
                      <li><a href="checkout.html">Checkout</a></li>
                      <li><a href="wishlist.html">Wish list</a></li>
                    </ul>

                    <ul class="dropdown-menu__col -banner">
                      <a href="shop-fullwidth-4col.html">
                        <img src="{{ URL('fe/images/header/dropdown-menu-banner.png') }}" alt="New product banner.html"/>
                      </a>
                    </ul>
                  </ul> --}}
                </li>

                <li><a href="{{ route('contact') }}">Kontak</a></li>
              </ul>
            </div>

            <div class="navigation-sidebar__footer">
            </div>

            <div class="social-icons ">
              <ul style="display: flex; flex-direction: column;">
                <li>
                  <a href="https://shopee.co.id/acl_cosm">
                    <img
                      src="{{ URL('img/shopee-icon.png') }}"
                      style="
                        width: 20px;
                    ">
                    Shopee Official
                  </a>
                </li>

                <li>
                  <a href="https://www.tokopedia.com/aclcosm">
                    <img
                      src="{{ URL('img/tokopedia-icon.png') }}"
                      style="
                        width: 30px;
                        margin: 5px -3px -8px -13px;
                    ">
                    Tokopedia Official
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
