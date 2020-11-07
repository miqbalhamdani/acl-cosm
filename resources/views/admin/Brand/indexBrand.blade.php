@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Static Layout')

@section('content')

<section id="admin-brand-form">
  <div class="col-md-6 col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">{{ $title }}</h4>


        <a href="{{ URL('admin/brand/add') }}" type="button" class="btn btn-outline-primary">
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
                  <tr>
                    <td>{{ $item->name }}</td>
                    <td class="w-150">
                      <a href="{{ URL('/admin/brand/edit/'. $item->id) }}">
                        <i class="badge-circle badge-circle-secondary bx bx-edit font-medium-1"></i>
                      </a>

                      <a href="#" onclick="deleteItem('/admin/brand', {{ $item->id }})">
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
