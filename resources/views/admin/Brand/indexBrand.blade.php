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
          <table class="table" id="brandDatatable">
            <thead>
              <tr>
                <th>Brand Name</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($collection as $item)
              <tr>
                <td>{{ $item->name }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('page-scripts')
<script>
$(function() {
  $("#brandDatatable").DataTable({
    paging: false,
    info: false,
    searching: false,
  });
});
</script>
@endsection
