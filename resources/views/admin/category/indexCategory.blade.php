@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Static Layout')

@section('content')

<section id="admin-brand-form">
  <div class="col-md-6 col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">{{ $title }}</h4>

        <a href="{{ URL('admin/category/add') }}" type="button" class="btn btn-outline-primary">
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
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($collection as $item)
                  <tr class="table-light">
                    <td class="text-bold-500">{{ $item->name }}</td>
                    <td class="w-150">
                      <a href="{{ URL('/admin/category/edit/'. $item->id) }}">
                        <i class="badge-circle badge-circle-secondary bx bx-edit font-medium-1"></i>
                      </a>

                      <a href="#" onclick="deleteItem('/admin/category', {{ $item->id }})">
                        <i class="badge-circle badge-circle-secondary bx bx-trash font-medium-1"></i>
                      </a>
                    </td>
                  </tr>

                  @foreach ($item->child as $subItem)
                    <tr>
                      <td>
                        <i class="bx bx-subdirectory-right"></i>
                        {{ $subItem->name }}
                      </td>

                      <td class="w-150">
                        <a href="{{ URL('/admin/category/edit/'. $subItem->id) }}">
                          <i class="badge-circle badge-circle-secondary bx bx-edit font-medium-1"></i>
                        </a>

                        <a href="#" onclick="deleteItem('/admin/category', {{ $subItem->id }})">
                          <i class="badge-circle badge-circle-secondary bx bx-trash font-medium-1"></i>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                @endforeach
              </tbody>
            </table>

            {{-- <table class="table">
              <thead>
                <tr>
                  <th>{{ $title }} Name</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($collection as $item)
                <tr>
                  <td class="p-0">
                    @include('admin.category.itemCategory', ['item' => $item])
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

