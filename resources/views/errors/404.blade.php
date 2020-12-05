@extends('layouts.default')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-5">
      <img src="{{ URL('img/404/product.jpg') }}" width="100%">
    </div>

    <div
      class="col-7"
      style="display: flex;
      flex-direction: column;
      justify-content: center;
    ">
      <h1>UH OH! You're lost.</h1>
      <p class="mt-4 mb-4" style="line-height: 30px">The product you are looking for does not exist. How you got here is a mystery. But you can click the button below to go back to the product list</p>

      <a href="{{ route('product-list') }}">
        <button class="btn -light-red">
          Product List
        </button>
      </a>
    </div>
  </div>


</div>

@endsection
