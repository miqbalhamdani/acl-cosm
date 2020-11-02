@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Static Layout')

{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/ui/prism.min.css')}}">
@endsection

@section('content')
<section id="dashboard">
  <h1>Welcome {{ Auth::user()->name }} ...</h1>
</section>
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/ui/prism.min.js')}}"></script>
@endsection
