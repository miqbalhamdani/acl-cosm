@extends('layouts.default')

@section('content')

<div class="about">
  <div class="introduction-one">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-6">
          <div class="introduction-one-image">
            <div class="introduction-one-image__detail">
              <img src="https://afinda.vn/html/Eliah/assets/images/introduction/IntroductionOne/img1.png" alt="background"/>
              <img src="https://afinda.vn/html/Eliah/assets/images/introduction/IntroductionOne/img2.png" alt="background"/>
            </div>

            <div class="introduction-one-image__background">
              <div class="background__item">
                <div class="wrapper" ref="{bg1}">
                  <img data-depth="0.5" src="https://afinda.vn/html/Eliah/assets/images/introduction/IntroductionOne/bg1.png" alt="background"/>
                </div>
              </div>

              <div class="background__item">
                <div class="wrapper" ref="{bg2}">
                  <img
                    data-depth="0.3"
                    data-invert-x=""
                    data-invert-y=""
                    src="https://afinda.vn/html/Eliah/assets/images/introduction/IntroductionOne/bg2.png"
                    alt="background"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6">
          <div class="introduction-one-content">
            <h5>
              ABOUT
              <span> ELIAH</span>
            </h5>

            <div class="section-title " style="margin-bottom: 1.875em">
              <h2>When You Look Good </br> You Feel Good</h2>
              <img src="https://afinda.vn/html/Eliah/assets/images/introduction/IntroductionOne/content-deco.png" alt="Decoration"/>
            </div>

            <p>The top three occupations in the Beauty salons Industry Group are Hairdressers, hairstylists, & cosmetologists, Manicurists and pedicurists, Receptionists & information clerks, Supervisors of personal care and service workers, and Skincare specialists.</p>

            <a class="btn -white" href="#">Appointment</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="introduction-two">
    <div class="video-frame" style="height: 500px; width: 888.889px;">
      <div class="video-frame__poster">
        <img src="https://afinda.vn/html/Eliah/assets/images/introduction/IntroductionTwo/4.png" alt="Video poster"/>
      </div>

      <a class="btn -white -round" href="#" style="height: 50px; width: 50px; line-height: 50px; padding: 0px;">
        <i class="fas fa-play"></i>
      </a>
    </div>

    <div class="introduction-two-content">
      <div class="container">
        <div
          class="introduction-two-content__item active"
          data-cover="https://afinda.vn/html/Eliah/assets/images/introduction/IntroductionTwo/1.png"
          data-src="https://www.youtube.com/embed/80e0QHPYRG4"
        >
          <a href="#">Body treatment</a>
          <p>Supro was born</p>
        </div>

        <div
          class="introduction-two-content__item"
          data-cover="https://afinda.vn/html/Eliah/assets/images/introduction/IntroductionTwo/2.png"
          data-src="https://www.youtube.com/embed/xn7jfVWWSio"
        >
          <a href="#">Professinal makeup</a>
          <p>Supro was born</p>
        </div>

        <div
          class="introduction-two-content__item"
          data-cover="https://afinda.vn/html/Eliah/assets/images/introduction/IntroductionTwo/3.png"
          data-src="https://www.youtube.com/embed/K3M-czGNUCg"
        >
          <a href="#">Maincure &amp; pedicure</a>
          <p>Supro was born</p>
        </div>

        <div
          class="introduction-two-content__item"
          data-cover="https://afinda.vn/html/Eliah/assets/images/introduction/IntroductionTwo/4.png"
          data-src="https://www.youtube.com/embed/hoPiGLf0ICA"
        >
          <a href="#">Hair cut &amp; Coloring</a>
          <p>Supro was born</p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
