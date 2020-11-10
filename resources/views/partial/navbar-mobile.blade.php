<div class="drawer drawer-right slide" id="mobile-menu-drawer" tabindex="-1" role="dialog" aria-labelledby="drawer-demo-title" aria-hidden="true">
  <div class="drawer-content drawer-content-scrollable" role="document">
    <div class="drawer-body">
      <div class="cart-sidebar">
        <div class="cart-items__wrapper">
          <div class="navigation-sidebar">
            <div class="search-box">
              <form>
                <input type="text" placeholder="What are you looking for?"/>
                <button>
                  <img src="{{ URL('fe/images/header/search-icon.png') }}" alt="Search icon"/>
                </button>
              </form>
            </div>

            <div class="navigator-mobile">
              <ul>
                <li class="relative">
                  <a class="dropdown-menu-controller" href="#">
                    Home
                    <span class="dropable-icon">
                      <i class="fas fa-angle-down"></i>
                    </span>
                  </a>

                  <ul class="dropdown-menu">
                    <li><a href="homepages/homepage1.html">Beauty Salon</a></li>
                    <li><a href="homepages/homepage2.html">Makeup Salon</a></li>
                    <li><a href="homepages/homepage3.html">Natural Shop</a></li>
                    <li><a href="homepages/homepage4.html">Spa Shop</a></li>
                    <li><a href="homepages/homepage5.html">Mask Shop</a></li>
                    <li><a href="homepages/homepage6.html">Skincare Shop</a></li>
                  </ul>
                </li>

                <li><a href="services.html">Services</a></li>
                <li><a href="about.html">About</a></li>

                <li>
                  <a class="dropdown-menu-controller" href="#">
                    Shop
                    <span class="dropable-icon">
                      <i class="fas fa-angle-down"></i>
                    </span>
                  </a>

                  <ul class="dropdown-menu">
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
                  </ul>
                </li>

                <li><a href="blog.html">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
              </ul>
            </div>

            <div class="navigation-sidebar__footer">
              <select class="customed-select -borderless" name="currency">
                <option value="usd">USD</option>
                <option value="vnd">VND</option>
                <option value="yen">YEN</option>
              </select>

              <select class="customed-select -borderless" name="currency">
                <option value="en">EN</option>
                <option value="vi">VI</option>
                <option value="jp">JP</option>
              </select>
            </div>

            <div class="social-icons ">
              <ul>
                <li>
                  <a href="https://www.facebook.com/" style="'color: undefined'">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>

                <li>
                  <a href="https://twitter.com" style="'color: undefined'">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>

                <li>
                  <a href="https://instagram.com/" style="'color: undefined'">
                    <i class="fab fa-instagram"> </i>
                  </a>
                </li>

                <li>
                  <a href="https://www.youtube.com/" style="'color: undefined'">
                    <i class="fab fa-youtube"></i>
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
