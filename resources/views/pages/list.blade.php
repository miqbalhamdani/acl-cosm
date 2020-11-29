@extends('layouts.default')

@section('content')

<div class="shop">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-4 col-lg-3">
        <div class="shop-sidebar">
          <div class="shop-sidebar__content">
            @include('components.list.category', ['categories' => $categories])

            @include('components.list.brand', ['brands' => $brands])
          </div>
        </div>
      </div>

      <div class="col-12 col-md-8 col-lg-9">
        {{-- @include('components.list.filter') --}}

        <div class="shop-products">
          <div class="shop-products__gird">
            <div class="row">
              @foreach ($collection as $item)
              <div class="col-12 col-sm-6 col-lg-4">
                @include('components.list.product-item', ['item' => $item])
              </div>
              @endforeach
            </div>
          </div>
        </div>

        @include('components.list.paginations', ['paginations' => $collection])
      </div>
    </div>
  </div>
</div>

@endsection
