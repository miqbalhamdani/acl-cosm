@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Static Layout')

@section('content')
<section id="admin-brand-form">
  <div class="col-md-6 col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{ $title }}</h4>
      </div>

      <div class="card-content">
        <div class="card-body">

          @if (@$error_message)
          <div class="alert border-danger alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <div class="d-flex align-items-center">
              <i class="bx bx-error"></i>
              <span>
                {{ $error_message }}
              </span>
            </div>
          </div>
          @endif

          <form class="form form-vertical" method="POST" action="{{ URL(setPostUrl()) }}">
            {{ csrf_field() }}

            <div class="form-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="first-name-vertical">
                      Category Name
                    </label>
                    <input
                      type="text"
                      class="form-control"
                      name="category_name"
                      value="{{ @$collection['name'] }}"
                      placeholder="Category Name"
                      autocomplete="off"
                      required
                    >
                  </div>

                  <div class="form-group">
                    <label for="first-name-vertical">
                      Main Category
                    </label>

                    <div class="form-group">
                      <select class="select2 form-control" name="parent_id">
                        <option></option>
                        @foreach ($categories as $item)
                          <option
                            value="{{ $item->id }}"
                            @if(@$collection['parent_id'] == $item->id)
                              selected
                            @endif
                          >
                            {{ $item->name }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-12 d-flex justify-content-end">
                  <button
                    type="submit"
                    class="btn btn-primary mr-1 mb-1"
                  >
                    Save
                  </button>

                  <a
                    href="{{ URL('admin/category') }}"
                    class="btn btn-light-secondary mb-1"
                  >
                    Cancel
                  </a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('page-scripts')
<script>
$(function() {
	$(".select2").select2({
    dropdownAutoWidth: true,
    width: '100%'
  });
});
</script>
@endsection
