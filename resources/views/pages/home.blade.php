@extends('layouts.default')

@section('content')

<x-home.banner />

<x-home.card />

<x-home.about />

@include('components.home.top-product', ['topProducts' => $topProducts])

<x-home.testimonial />

<x-home.professional-team />

@endsection
