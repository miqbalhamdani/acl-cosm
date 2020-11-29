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
            <p>Gg. Inonkailan No.86, Mustikasari,  <br>
              Kec. Mustika Jaya, Kota Bekasi, <br>
              Jawa Barat 17157</p>
          </div>
        </div>

        <div class="contact-info__item">
          <div class="contact-info__item__icon">
            <i class="fas fa-phone-alt"></i>
          </div>

          <div class="contact-info__item__detail">
            <h3>Phone</h3>
            <p>(021) 82651283</p>
          </div>
        </div>

        <div class="contact-info__item">
          <div class="contact-info__item__icon">
            <i class="far fa-envelope"></i>
          </div>

          <div class="contact-info__item__detail">
            <h3>Email</h3>
            <p>cosm_acl@yahoo.com</p>
          </div>
        </div>

        <div class="contact-info__item">
          <div class="contact-info__item__icon">
            <img
              src="{{ URL('img/shopee-icon.png') }}"
              style="
                margin-top: -5px;
                width: 20px;
            ">
          </div>

          <div class="contact-info__item__detail">
            <h3>Shopee Official</h3>
            <p><a href="https://shopee.co.id/acl_cosm">https://shopee.co.id/acl_cosm</a></p>
          </div>
        </div>

        <div class="contact-info__item">
          <div class="contact-info__item__icon">
            <img
              src="{{ URL('img/tokopedia-icon.png') }}"
              style="
                margin-left: -5px;
                margin-top: -10px;
                width: 30px;
            ">
          </div>

          <div class="contact-info__item__detail">
            <h3>Tokopedia Official</h3>
            <p><a href="https://www.tokopedia.com/aclcosm">https://www.tokopedia.com/aclcosm</a></p>
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
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15862.843495350153!2d106.9996228!3d-6.3016691!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4dd83a342acf520f!2sPT%20Aulia%20Citra%20Lestari!5e0!3m2!1sid!2sid!4v1606621780282!5m2!1sid!2sid"
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
