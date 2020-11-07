<div class="collapse-header">
  <div class="d-flex justify-content-between">
    <div
      id="headingCollapse-{{ $item->slug }}"
      class="card-header"
      style="width: calc(100% - 130px);"
      data-toggle="collapse"
      role="button"
      data-target="#collapse-{{ $item->slug }}"
      aria-expanded="true"
      aria-controls="collapse-{{ $item->slug }}"
    >
      <span class="collapse-title">
        {{ $item->name }}
      </span>
    </div>

    <div class="card-header">
      <a href="{{ URL('/admin/category/edit/'. $item->id) }}">
        <i class="badge-circle badge-circle-light-secondary bx bx-edit font-medium-1"></i>
      </a>

      <a href="#" onclick="deleteItem('/admin/category', {{ $item->id }})">
        <i class="badge-circle badge-circle-light-secondary bx bx-trash font-medium-1"></i>
      </a>
    </div>
  </div>

  <div
    id="collapse-{{ $item->slug }}"
    role="tabpanel"
    aria-labelledby="headingCollapse-{{ $item->slug }}"
    class="collapse"
  >
    <div class="card-content">
      <div class="table-responsive">
        <table class="table table-borderless mb-0">
          <tbody>
            @foreach ($item->child as $subItem)
            <tr>
              <td>
                <i class="bx bx-subdirectory-right"></i>
                {{ $subItem->name }}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
