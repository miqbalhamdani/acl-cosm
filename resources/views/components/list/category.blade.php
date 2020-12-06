<div class="shop-sidebar__section -categories navigation-sidebar">
  <div class="section-title -style1 -medium" style="margin-bottom:1.875em">
    <h2>Categories</h2>
    <img src="{{ URL('fe/images/introduction/IntroductionOne/content-deco.png') }}" alt="Decoration"/>
  </div>

  {{-- <ul>
    @if(Cache::has('product-categories'))
    @foreach ($categories as $item)
      @if (!$item->parent_id)
        <li>
          <a href="#">
            {{ $item->name }}
          </a>
        </li>

        @foreach ($item->child as $subItem)
          <li class="pl-3">
            <a href="{{ route('product-list', [
              'category' => $subItem->slug,
            ]) }}">
              {{ $subItem->name }}
            </a>
          </li>
        @endforeach
      @endif
    @endforeach
    @endif
  </ul> --}}

  <div class="navigator-mobile navigator-category">
    @foreach ($categories as $category)
    @if (!$category->parent_id)

    <a class="dropdown-menu-controller dropdown-menu-title" href="#">
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
  </div>
</div>
