<div class="menu -style-3">
  <div class="container">
    <div class="menu__wrapper">
      <a href="/index.html">
        <img src="{{ URL('fe/images/logo-white.png') }}" alt="Logo" />
      </a>

      <div class="navigator -white">
        <ul>
          <li class="relative">
            <a href="">
              Home
              <span class="dropable-icon">
                <i class="fas fa-angle-down"></i>
              </span>
            </a>

            <ul class="dropdown-menu">
              <li><a href="">Beauty Salon</a></li>
              <li><a href="homepage2.html">Makeup Salon</a></li>
              <li><a href="homepage3.html">Natural Shop</a></li>
              <li><a href="homepage4.html">Spa Shop</a></li>
              <li><a href="homepage5.html">Mask Shop</a></li>
              <li><a href="homepage6.html">Skincare Shop</a></li>
            </ul>
          </li>

          <li><a href="services.html">Services</a></li>
          <li><a href="about.html">About</a></li>
          <li>
            <a href="shop-fullwidth-4col.html">
              Shop
              <span class="dropable-icon">
                <i class="fas fa-angle-down"></i>
              </span>
            </a>

            <ul class="dropdown-menu -wide">
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
                <li><a href="product-detail.html">Product Detail</a></li>
                <li><a href="cart.html">Shopping cart</a></li>
                <li><a href="checkout.html">Checkout</a></li>
                <li><a href="wishlist.html">Wish list</a></li>
              </ul>
              <ul class="dropdown-menu__col -banner">
                <a href="shop-fullwidth-4col.html">
                  <img src="{{ URL('fe/images/header/dropdown-menu-banner.png') }}" alt="New product banner" />
                </a>
              </ul>
            </ul>
          </li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </div>

      <div class="menu-functions -white">
        <a class="menu-icon -search" href="#">
          <img src="{{ URL('fe/images/header/search-icon-white.png') }}" alt="Search icon" />
        </a>

        <div class="search-box">
          <form>
            <input type="text" placeholder="What are you looking for?" name="search" />
            <button><img src="{{ URL('fe/images/header/search-icon.png') }}" alt="Search icon" /></button>
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
