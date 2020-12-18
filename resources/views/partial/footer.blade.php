<div class="footer-one">
  <div class="container">
    <div class="footer-one__header">
      <div class="footer-one__header__logo">
        <a href="/homepages/homepage1">
          <img src="{{ URL('img/logo/logo.png') }}" alt="Logo"/>
          <span>Aulia Citra Lestari</span>
        </a>
      </div>

      {{-- <div class="footer-one__header__social">
        <div class="social-icons -border">
          <ul>
            <li>
              <a href="https://www.facebook.com/" style="'color: undefined'">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li>
              <a href="https://twitter.com" style="'color: undefined'">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="https://instagram.com/" style="'color: undefined'">
                <i class="fab fa-instagram"> </i>
              </a>
            </li>
            <li>
              <a href="https://www.youtube.com/" style="'color: undefined'">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
          </ul>
        </div>
      </div> --}}
    </div>

    <div class="footer-one__body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
          <div class="footer__section -info">
            <h5 class="footer-title">Kontak info</h5>
            <p>Address: <br>
              <span>
                Gg. Inonkailan No.86, Mustikasari,  <br>
                Kec. Mustika Jaya, Kota Bekasi, <br>
                Jawa Barat 17157
              </span>
            </p>

            <p>Phone:<span>(021) 82651283</span></p>

            <p>Email:<span>cosm_acl@yahoo.com</span></p>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
          <div class="footer__section -links">
            <h5 class="footer-title">Locations</h5>

            <iframe
              src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15862.843495350153!2d106.9996228!3d-6.3016691!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4dd83a342acf520f!2sPT%20Aulia%20Citra%20Lestari!5e0!3m2!1sid!2sid!4v1606621780282!5m2!1sid!2sid"
              width="100%"
              height="100%"
              frameborder="0"
              allowfullscreen="">
            </iframe>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3 offset-lg-1">
          <div class="footer__section -links">
            <h5 class="footer-title">Keep In Touch</h5>

            <div class="contact-info__item">
              <div class="contact-info__item__icon">
                <img
                  src="{{ URL('img/shopee-icon.png') }}"
                  style="
                    width: 20px;
                ">
              </div>

              <div class="contact-info__item__detail">
                <p><a href="https://shopee.co.id/acl_cosm">
                  Shopee Official
                </a></p>
              </div>
            </div>

            <div class="contact-info__item">
              <div class="contact-info__item__icon">
                <img
                  src="{{ URL('img/tokopedia-icon.png') }}"
                  style="
                    margin-left: -5px;
                    margin-top: -5px;
                    width: 30px;
                ">
              </div>

              <div class="contact-info__item__detail">
                <p><a href="https://www.tokopedia.com/aclcosm">
                  Tokopedia Official
                </a></p>
              </div>
            </div>

            <div class="contact-info__item">
              <div class="contact-info__item__icon">
                <img
                  src="{{ URL('img/google-icon.png') }}"
                  style="
                    margin-left: -4px;
                    margin-top: -3px;
                    width: 25px;
                ">
              </div>

              <div class="contact-info__item__detail">
                <p><a href="https://g.page/r/CQ9Szyo0OthNEBM">
                  Google Bussiness
                </a></p>
              </div>
            </div>

            <div class="contact-info__item">
              <div class="contact-info__item__icon">
                <img
                  src="{{ URL('img/instagram-icon.png') }}"
                  style="
                  margin-left: -3px;
                  margin-top: 0px;
                  width: 25px;
                ">
              </div>

              <div class="contact-info__item__detail">
                <p><a href="https://www.instagram.com/aclcosm_official/">
                  Instagram
                </a></p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-one__footer">
    <div class="container">
      <div class="footer-one__footer__wrapper">
        <p>© PT Aulia Citra Lestari 2004-{{ date("Y") }}.</p>
        <ul>
          <li><a href="contact.html">Privacy Policy</a></li>
          <li><a href="contact.html">Terms &amp; Condition</a></li>
          <li><a href="contact.html">Site map</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
