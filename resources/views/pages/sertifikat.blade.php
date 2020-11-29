@extends('layouts.default')

@section('content')

<div class="about">
  <div class="container post__body">

    <div class="post-content">
      <div class="post-content__header d-block">
        <div class="post-content__header__content text-center">
          <img src="{{ URL('img/sertifikasi/pic-1.png') }}" alt="Sertifikat Cara Pembuatan Kosmetik Yang Baik">
          <img src="{{ URL('img/sertifikasi/pic-2.png') }}" alt="Majelis Ulama Indonesia">
          <img src="{{ URL('img/sertifikasi/pic-3.png') }}" alt="Badan POM">
        </div>
      </div>

      <div class="post-content__body">
        <div class="post-paragraph">
          Sebagai salah satu pabrik kosmetik di Indonesia, PT Aulia Citra Lestari memiliki beberapa sertifikasi yang menjadi bukti bahwa PT Aulia Citra Lestari berproduksi dengan standar CPKB dan MUI. Sertifikasi ini menunjukkan bahwa sistem produksi kami aman dan terkontrol sehingga produk yang dihasilkan dapat terjamin kualitasnya. Semua produk kosmetik yang kami hasilkan pastinya kami daftarkan dan tersertifikasi di BPOM. Dengan sertifikasi diatas, kami menjamin bahwa produk yang kami hasilkan bisa dipertanggungjawabkan secara hukum, legal, dan tetap Halal.
        </div>
      </div>
    </div>

  </div>
</div>

@endsection

@push('css')
<style>
.post-content .post-content__header__content img {
  margin: 0 30px;
  width: 250px;
}
</style>
@endpush
