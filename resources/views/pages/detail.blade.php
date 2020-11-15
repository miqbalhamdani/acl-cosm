@extends('layouts.default')

@section('content')

<Detail
  :product="{{ json_encode(json_decode($product)) }}"
></Detail>

@include('components.detail.related-product')

@include('components.detail.instagram')

@endsection
