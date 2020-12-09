@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Static Layout')

{{-- vendor styles --}}
@section('vendor-styles')

@section('content')
<section id="admin-brand-form">
  <div class="col-md-8 col-12">
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
                    <label for="category-name">
                      Category Name
                    </label>
                    <input
                      type="text"
                      id="category-name"
                      class="form-control"
                      name="name"
                      value="{{ @$collection['name'] }}"
                      placeholder="Category Name"
                      autocomplete="off"
                    >
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <label for="first-name-vertical">
                      Product
                    </label>
                    <select
                        data-placeholder="Select a Product..."
                        class="select2-brand form-control"
                        id="product-brand"
                        name="products[]"
                        multiple="multiple"
                      >
                        @foreach ($products as $item)
                          <option
                            value="{{ $item->id }}"
                            @if(in_array($item->id, explode(',', @$collection['products'])))
                              selected
                            @endif
                          >
                            {{ $item->name }}
                          </option>
                        @endforeach
                      </select>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <label for="sequence">
                      Sequence
                    </label>
                    <input
                      type="number"
                      id="sequence"
                      class="form-control"
                      name="sequence"
                      value="{{ @$collection['sequence'] }}"
                      min="1"
                      placeholder="Sequence"
                      autocomplete="off"
                    >
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <label for="sequence">
                      Is Active Product?
                    </label>
                    <div class="custom-control custom-switch custom-control-inline mb-1 d-block">
                      <span class="mr-1">Inactive</span>
                      <input
                        type="checkbox"
                        name="is_active"
                        class="custom-control-input"
                        @if (@$collection['is_active']) checked @endif
                        id="customSwitch1"
                      >
                      <label class="custom-control-label mr-1" for="customSwitch1"></label>
                      <span>Active</span>
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
                    href="{{ URL('admin/top-product') }}"
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
  'use strict';

	$(".select2-brand").select2({
    dropdownAutoWidth: true,
    width: '100%'
  });

});
</script>
@endsection
