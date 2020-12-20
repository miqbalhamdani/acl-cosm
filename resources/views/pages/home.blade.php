@extends('layouts.default')

@section('content')

<x-home.banner />

{{-- <x-home.card /> --}}

@include('components.home.top-product',
  ['topProducts' => $topProducts]
)

<x-home.about />

<x-home.testimonial />

{{-- <x-home.professional-team /> --}}

@endsection
