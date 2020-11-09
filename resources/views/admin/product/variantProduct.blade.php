@php

@endphp

<div class="card collapse-header m-0">
  <div
    id="headingCollapse-{{ $item->id }}"
    class="card-header"
    data-toggle="collapse"
    role="button"
    data-target="#collapse-{{ $item->id }}"
    aria-expanded="false"
    aria-controls="collapse-{{ $item->id }}"
  >
    <span class="collapse-title">
      <i class='bx bxs-package align-middle'></i>
      <span class="align-middle">Size Product</span>
    </span>
  </div>
  <div
    id="collapse-{{ $item->id }}"
    role="tabpanel"
    aria-labelledby="headingCollapse-{{ $item->id }}"
    class="collapse"
  >
    <div class="card-content">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-light mb-0">
            <thead>
              <tr>
                <th>Size Name</th>
                <th>Image</th>
              </tr>
            </thead>
            <tbody>
              @php
                $variants = json_decode($item->variants);
                $path = env('PATH_PRODUCT') .'/'. $item->slug .'/';
              @endphp

              @foreach ($variants as $variant)
                <tr>
                  <td>{{ $variant->size }}</td>
                  <td><img src="{{ URL($path . $variant->image) }}" height="50px" alt=""></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
