@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Static Layout')

@section('content')

<section id="admin-brand-form">
  <div class="col-md-12 col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">{{ $title }}</h4>


        <a href="{{ URL('admin/top-product/add') }}" type="button" class="btn btn-outline-primary">
          <i class="bx bx-plus"></i>
          <span class="align-middle ml-25">Add {{ $title }}</span>
        </a>
      </div>

      <div class="card-content">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table mb-0">
              <thead class="text-center">
                <tr>
                  <th>Products</th>
                  <th>Sequence</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach ($collection as $item)
                  <tr>
                    <td>
                      <h3 class="mb-1 font-weight-bold">
                        {{ $item->name }}
                      </h3>

                      @foreach ($item->list_product as $product)
                      <div class="badge badge-pill badge-glow badge-primary mr-1 mb-1">
                        {{ $product->name }}
                      </div>
                      @endforeach
                    </td>
                    <td class="text-center">{{ $item->sequence }}</td>
                    <td class="text-center">{!! $item->is_active_html !!}</td>

                    <td class="w-150">
                      <a href="{{ URL('/admin/top-product/edit/'. $item->id) }}">
                        <i class="badge-circle badge-circle-secondary bx bx-edit font-medium-1"></i>
                      </a>

                      <a href="#" onclick="deleteItem('/admin/top-product', {{ $item->id }})">
                        <i class="badge-circle badge-circle-secondary bx bx-trash font-medium-1"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
