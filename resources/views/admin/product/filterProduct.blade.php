<div class="card">
  <div class="card-content">
    <div class="card-body">

      <form
        class="form form-vertical"
        method="GET"
        action="{{ URL(setPostUrl()) }}"
      >
        <div class="form-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="product-name">
                  Product Name
                </label>

                <input
                  type="text"
                  id="product-name"
                  class="form-control"
                  name="name"
                  value="{{ @$input['name'] }}"
                  placeholder="Product Name"
                >
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label for="product-brand">
                  Brand
                </label>

                <div class="form-group">
                  <select
                    data-placeholder="Select a brand..."
                    class="select2-brand form-control"
                    id="product-brand"
                    name="brand"
                  >
                    <option value="all" @if(@$input['brand'] == 'all') selected @endif>
                      All Brands
                    </option>

                    @foreach ($brands as $item)
                      <option
                        value="{{ $item->slug }}"
                        @if(@$input['brand'] == $item->slug)
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
                  Category
                </label>

                <div class="form-group">
                  <select
                    data-placeholder="Select a category..."
                    class="select2-category form-control"
                    id="product-category"
                    name="category"
                  >
                    <option value="all" @if(@$input['category'] == 'all') selected @endif>
                      All Categories
                    </option>

                    @foreach ($categories as $item)
                      <optgroup label="{{ $item->name }}">
                        @foreach ($item->child as $subItem)
                          <option
                            value="{{ $subItem->slug }}"
                            @if(@$input['category'] == $subItem->slug)
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

            <div class="col-12 d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-1 mb-1">Search</button>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

@section('page-scripts')
<script>
$(function() {
  'use strict';

	$(".select2-brand").select2({
    dropdownAutoWidth: true,
    width: '100%'
  });

  $(".select2-category").select2({
    dropdownAutoWidth: true,
    width: '100%',
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
});
</script>
@endsection
