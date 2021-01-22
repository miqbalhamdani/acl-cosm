@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Static Layout')

@section('content')

<section id="admin-ask-questions-form">
  <div class="col-md-12 col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">{{ $title }}</h4>
      </div>

      <div class="card-content">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>{{ $title }}</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach ($collection as $item)
                <tr style="cursor: pointer">
                  <td>
                    <a
                      href="{{ URL('/admin/ask-question/'. $item->id) }}"
                      style="color: #475F7B;"
                    >
                      <h5>{{ $item->title }}</h5>
                      {{ $item->name }} | {{ $item->email }} <br />
                      <p
                        style="
                        text-overflow: ellipsis;
                        overflow: hidden;
                        width: 100vh;
                        height: 1.2em;
                        white-space: nowrap;
                      ">
                        {!! $item->message !!}
                      </p>
                    </a>
                  </td>

                  <td class="w-150">
                    @if (true)
                    <a href="{{ URL('/admin/ask-question/read/'. $item->id) }}">
                      <i class="badge-circle badge-circle-secondary bx bx-conversation font-medium-1"></i>
                    </a>
                    @else
                    <a href="{{ URL('/admin/ask-question/unread/'. $item->id) }}">
                      <i class="badge-circle badge-circle-secondary bx bx-message font-medium-1"></i>
                    </a>
                    @endif

                    <a href="#" onclick="deleteItem('/admin/ask-question', {{ $item->id }})">
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

