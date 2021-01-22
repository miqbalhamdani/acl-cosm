@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Static Layout')

@section('content')

<section id="admin-ask-questions-form">
  <div class="col-md-12 col-12">
    @if (@session('success_message'))
    <div class="alert alert-success alert-dismissible mb-2" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <div class="d-flex align-items-center">
        <i class="bx bx-like"></i>
        <span>
          {{ session('success_message') }}
        </span>
      </div>
    </div>
    @endif

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
                      <h5>{{ $item->title }} {!! $item->status_html !!}</h5>
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
                    @if ($item->status != 1)
                    <a href="{{ URL('/admin/ask-question/read/'. $item->id) }}">
                      <i
                        class="badge-circle badge-circle-secondary bx bx-conversation font-medium-1"
                        data-toggle="tooltip"
                        data-placement="bottom"
                        title=""
                        data-original-title="Tandai sebagai telah dibaca"
                      ></i>
                    </a>
                    @else
                    <a href="{{ URL('/admin/ask-question/unread/'. $item->id) }}">
                      <i
                        class="badge-circle badge-circle-secondary bx bx-message font-medium-1"
                        data-toggle="tooltip"
                        data-placement="bottom"
                        title=""
                        data-original-title="Tandai sebagai belum dibaca"
                      ></i>
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

