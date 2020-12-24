@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Static Layout')

@section('content')

<section id="admin-ask-questions-show">
  <div class="col-xl-12 col-md-12 col-sm-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        {{ $collection->name }} | {{ $collection->email }}
      </div>

      <div class="card-content">
        <div class="card-body">
          <h4 class="card-title">
            {{ $collection->title }}
          </h4>

          <p class="card-text">
            {!! $collection->message !!}
          </p>
        </div>
      </div>

      <div class="card-footer d-flex justify-content-end">
        <a href="{{ URL('/admin/ask-questions') }}">
          <button class="btn btn-light-primary">
            Back
          </button>
        </a>
      </div>
    </div>
  </div>
</section>
@endsection
