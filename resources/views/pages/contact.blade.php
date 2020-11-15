@extends('layouts.default')

@section('content')

<div class="contact">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <h3 class="contact-title">
          Contact info
        </h3>

        <div class="contact-info__item">
          <div class="contact-info__item__icon">
            <i class="fas fa-map-marker-alt"></i>
          </div>

          <div class="contact-info__item__detail">
            <h3>Address</h3>
            <p>2168 S Archer Ave, Chicago, IL 60616, US</p>
          </div>
        </div>

        <div class="contact-info__item">
          <div class="contact-info__item__icon">
            <i class="fas fa-phone-alt"></i>
          </div>

          <div class="contact-info__item__detail">
            <h3>Phone</h3>
            <p>+1 312-808-1999 | +1 233-688-8999</p>
          </div>
        </div>

        <div class="contact-info__item">
          <div class="contact-info__item__icon">
            <i class="far fa-envelope"></i>
          </div>

          <div class="contact-info__item__detail">
            <h3>Email</h3>
            <p>Beatycosmetics@gmail.com</p>
          </div>
        </div>

        <div class="contact-info__item">
          <div class="contact-info__item__icon">
            <i class="far fa-clock"></i>
          </div>

          <div class="contact-info__item__detail">
            <h3>Opentime</h3>
            <p>Sun-Sat: 8.00am - 9.00.pm</p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <h3 class="contact-title">
          Get in touch
        </h3>

        <div class="contact-form">
          <form>
            <div class="input-validator">
              <input
                type="text"
                name="name"
                placeholder="Name"
              />
            </div>

            <div class="input-validator">
              <input
                type="text"
                name="email"
                placeholder="Email"
              />
            </div>

            <div class="input-validator">
              <textarea
                name="message"
                id="" cols="30"
                rows="3"
                placeholder="Message"
              >
              </textarea>
            </div>

            <a class="btn -dark" href="#">
              SEND MESSAGE
            </a>
          </form>
        </div>
      </div>

      <div class="col-12">
        <iframe
          class="contact-map"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26544.761428132653!2d105.83081260286463!3d21.01523825635793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1594639675485!5m2!1svi!2s"
          width="100%"
          height="450"
          frameborder="0"
          allowfullscreen="">
        </iframe>
      </div>
    </div>
  </div>
</div>

@endsection
