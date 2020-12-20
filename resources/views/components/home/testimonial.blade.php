<div class="testimonial">
  <div class="section-title -center" style="margin-bottom: 3.125rem">
    <h2>KEUNGGULAN KAMI</h2>
    <img src="{{ URL('fe/images/introduction/IntroductionOne/content-deco.png') }}" alt="Decoration"/>
  </div>

  <div class="container">
    <div class="testimonial-slider">
      <div class="row">

        @php
          $testimonials = array(
            array(
                'img' => 'Picture1.png',
                'title' => 'CPKB',
                'desc' => 'Kami telah tersertifikasi CPKB (Cara Pembuatan Kosmetik yang Baik) oleh BPOM sehingga kami dapat dipercaya  untuk memproduksi kosmetik yang berkualitas.'
            ),
            array(
                'img' => 'Picture2.png',
                'title' => 'HALAL MUI',
                'desc' => 'PT Aulia Citra Lestari juga telah memiliki sertifikat Halal MUI. Proses pemilihan bahan hingga kualitas produk jadi yang kami hasilkan sudah pasti kehalalannya.'
            ),
            array(
                'img' => 'Picture3.png',
                'title' => 'LEGALITAS',
                'desc' => 'Perusahaan kami dapat membantu dan memberikan konsultasi dalam proses perolehan izin BPOM, HKI, dan Halal.'
            ),
            array(
                'img' => 'Picture4.png',
                'title' => 'FORMULA',
                'desc' => 'Kami memiliki bank formula yang dapat disesuaikan dengan kriteria produk impian Anda serta konsultasi oleh tim kami.'
            ),
            array(
                'img' => 'Picture5.png',
                'title' => 'TEAM',
                'desc' => 'Kerja sama yang baik dalam team kami memberikan lingkungan yang efisien sehingga dapat mempermudah proses.'
            ),
        );;
        @endphp

        @foreach ($testimonials as $item)
        <div class="col-sm-12 col-md-6 col-lg-auto testimonial-card">
          <div class="testimonial-image">
            <img src="{{ URL('img/keunggulan-kami/'. $item['img']) }}">
          </div>

          <div class="testimonial-content text-center">
            <h3>{{ $item['title'] }}</h3>
            <p>{{ $item['desc'] }}</p>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
</div>
