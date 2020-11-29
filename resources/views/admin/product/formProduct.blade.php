@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Static Layout')

@section('vendor-styles')
<style>
#myAwesomeDropzone {
  min-height: 250px;
  margin-bottom: 2rem;
}

#myAwesomeDropzone .bx.bx-upload {
  font-size: 3.5rem;
  position: absolute;
  top: 48px;
  width: 80px;
  height: 80px;
  display: inline-block;
  left: 50%;
  margin-left: -40px;
  line-height: 1;
  z-index: 2;
  color: #5A8DEE;
  text-indent: 0px;
  font-weight: normal;
  -webkit-font-smoothing: antialiased;
}

#myAwesomeDropzone .dz-message:before {
  content: none;
}
</style>
@endsection

@section('content')
<section id="product">
  <div class="col-md-12 col-12">
    <form
      id="product-form"
      class="form form-vertical"
      method="POST"
      action="{{ URL(setPostUrl()) }}"
      enctype="multipart/form-data"
    >
      {{ csrf_field() }}

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

            <!-- BEGIN: Dropzone -->
            <input
              type="hidden"
              id="product-id"
              value="{{ @$collection['id'] }}"
            >
            <input
              type="hidden"
              id='product-slug'
              value="{{ @$collection['slug'] }}"
            >
            <input
              type="hidden"
              id="images"
              name="images"
              value="{{ $collection['images'] ? $collection['images'] : @$input['images'] }}"
            >
            <!-- END: Dropzone -->

            <div class="form-body">
              <div class="row">
                <div class="col-12">
                  <div
                    id="myAwesomeDropzone"
                    class="dropzone dropzone-area"
                  >
                    <div class="dz-message">
                      Drop Photos Here To Upload <br />
                      <i class="bx bx-upload"></i>
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <label for="product-name">
                      Product Name
                    </label>
                    <input
                      type="text"
                      id="product-name"
                      class="form-control"
                      name="product_name"
                      value="{{ @$collection['name'] }}"
                      placeholder="Product Name"
                      autocomplete="off"
                    >
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-group">
                    <label for="product-brand">
                      Brand Name
                    </label>

                    <div class="form-group">
                      <select
                        data-placeholder="Select a brand..."
                        class="select2-brand form-control"
                        id="product-brand"
                        name="brand"
                      >
                        @foreach ($brands as $item)
                          <option
                            value="{{ $item->id }}"
                            @if(@$collection['brand_id'] == $item->id)
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

                <div class="col-6">
                  <div class="form-group">
                    <label for="product-category">
                      Category Name
                    </label>

                    <div class="form-group">
                      <select
                        data-placeholder="Select a category..."
                        class="select2-category form-control"
                        id="product-category"
                        name="category"
                      >
                        @foreach ($categories as $item)
                          <optgroup label="{{ $item->name }}">
                            @foreach ($item->child as $subItem)
                              <option
                                value="{{ $subItem->id }}"
                                @if(@$collection['brand_id'] == $subItem->id)
                                  selected
                                @endif
                              >
                                {{ $subItem->name }}
                              </option>
                            @endforeach
                          </optgroup>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <label for="product-description">
                      Product Description
                    </label>
                    <fieldset class="form-group">
                      <textarea
                        rows="4"
                        class="form-control"
                        id="product-description"
                        name="description"
                        placeholder="Product Description"
                      >{{ @$collection['description'] }}
                      </textarea>
                    </fieldset>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- PRODUCT VARIANT --}}
      @php
        $variantCollection = @$collection['variants'] ? json_encode(json_decode($collection['variants'])) : json_encode([]);
        $sizeCollection = @$collection['variant_size'] ? json_encode(explode(',', $collection['variant_size'])) : json_encode([]);
      @endphp
      <product-variant
        id="{{ $collection['id'] }}"
        slug="{{ $collection['slug'] }}"
        :arr-size="{{ $sizeCollection }}"
        :variants="{{ $variantCollection }}"
      >
      </product-variant>

      <div class="col-12 d-flex justify-content-end">
        <button
          type="submit"
          class="btn btn-primary mr-1 mb-1"
        >
          Save
        </button>

        <a
          href="{{ URL('admin/product') }}"
          class="btn btn-light mb-1"
        >
          Cancel
        </a>
      </div>
    </form>
  </div>
</section>
@endsection

@section('page-scripts')
<script>
Dropzone.autoDiscover = false;

$(function() {
  'use strict';

  $('#product-form').on('keyup keypress', function(e) {
    const keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
      e.preventDefault();
      return false;
    }
  });

	$(".select2-brand").select2({
    dropdownAutoWidth: true,
    width: '100%'
  });

  $(".select2-category").select2({
    dropdownAutoWidth: true,
    width: '100%',
    minimumResultsForSearch: Infinity,
    templateResult: iconFormat,
    templateSelection: iconFormat,
    escapeMarkup: function(es) { return es; }
  });

  // Format icon
  function iconFormat(icon) {
    const originalOption = icon.element;
    if (!icon.id) { return icon.text; }
    const $icon = "<i class='" + $(icon.element).data('icon') + "'></i>" + icon.text;

    return $icon;
  }

  // Dropzone
  $("#myAwesomeDropzone").dropzone({
    url: '/admin/product/images/upload',
    parallelUploads: 10,
    acceptedFiles: '.jpg, .jpeg, .png',
    addRemoveLinks: true,
    headers: {
      'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
    },

    init: function()
    {
      const arrayImages = [];
      let images = $('#images').val();
      const productId = $('#product-id').val();
      const productSlug = $('#product-slug').val();

      if (images) {
        const myDropzone = this;
        const path = (productId) ? `/img/product/${productSlug}/` : '/img/temp/';
        images = images.split(',');

        for (let i = 0; i < images.length; i++) {
          let mockFile = {
            name: images[i]
          };

          arrayImages.push(images[i]); // insert all image to one variable

          myDropzone.emit("addedfile", mockFile);
          myDropzone.emit("thumbnail", mockFile, `${path}${arrayImages[i]}`);
          myDropzone.emit("complete", mockFile);
        }
      }

      // add image
      this.on("success", function(file, response)
      {
        file.image_name = response;
        arrayImages.push(file.image_name);

        document.getElementById("images").value = arrayImages;
      });

      // remove image
      this.on("removedfile", function(file)
      {
        // check, is file in temp folder or gallery folder
        const name = (file.image_name) ? file.image_name : file.name;
        const data = {
          name,
          productSlug,
        };

        $.ajax({
          type: "POST",
          headers: {
            'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
          },
          url: `/admin/product/images/remove`,
          data: data,
        });

        arrayImages.splice(arrayImages.indexOf(name), 1);
        document.getElementById("images").value = arrayImages;
      });
    },
  });
});
</script>
@endsection

