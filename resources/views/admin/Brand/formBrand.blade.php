@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Static Layout')

{{-- vendor styles --}}
@section('vendor-styles')
{{-- <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/vendors.min.css')}}"> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/ui/prism.min.css')}}"> --}}
@endsection

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
                      Brand Name
                    </label>
                    <input
                      type="text"
                      class="form-control"
                      name="brand_name"
                      placeholder="Brand Name"
                      autocomplete="off"
                      required
                    >
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
                    href="{{ URL('admin/brand') }}"
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

{{-- vendor scripts --}}
@section('vendor-scripts')
{{-- <script src="{{asset('vendors/js/ui/prism.min.js')}}"></script> --}}
@endsection
