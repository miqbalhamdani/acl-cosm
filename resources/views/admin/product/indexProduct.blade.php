@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Static Layout')

@section('content')

<section id="admin-product-form">
  <div class="col-md-12 col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">{{ $title }}</h4>


        <a href="{{ URL('admin/product/add') }}" type="button" class="btn btn-outline-primary">
          <i class="bx bx-plus"></i>
          <span class="align-middle ml-25">Add {{ $title }}</span>
        </a>
      </div>

      <div class="card-content">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table mb-0">
              <thead>
                <tr>
                  <th>{{ $title }} Name</th>
                  <th>Brand</th>
                  <th>Category</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach ($collection as $item)
                  <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->brand->name }}</td>
                    <td>{{ $item->category->name }}</td>

                    <td class="w-150">
                      <a href="{{ URL('/admin/product/edit/'. $item->id) }}">
                        <i class="badge-circle badge-circle-secondary bx bx-edit font-medium-1"></i>
                      </a>

                      <a href="#" onclick="deleteItem('/admin/product', {{ $item->id }})">
                        <i class="badge-circle badge-circle-secondary bx bx-trash font-medium-1"></i>
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td colspan="4" class="p-0">
                      @include('admin.product.variantProduct', [
                        'variants' => $item
                      ])
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            <div class="float-right">
              {{ $collection->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
