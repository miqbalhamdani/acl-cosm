<div class="footer-one">
  <div class="container">
    <div class="footer-one__header">
      <div class="footer-one__header__logo">
        <a href="/homepages/homepage1">
          <img src="{{ URL('img/logo/logo.png') }}" alt="Logo"/>
          <span>Aulia Citra Lestari</span>
        </a>
      </div>

      <div class="footer-one__header__social">
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
      </div>
    </div>

    <div class="footer-one__body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-5">
          <div class="footer__section -info">
            <h5 class="footer-title">Contact info</h5>
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

        <div class="col-12 col-md-6 col-lg-3">
          <div class="footer__section -links">
            <h5 class="footer-title">Infomation</h5>
            <ul>
              <li><a href="about.html">About us</a></li>
              <li><a href="contact.html">Careers</a></li>
              <li><a href="contact.html">Delivery Information</a></li>
              <li><a href="contact.html">Privacy Policy</a></li>
              <li><a href="contact.html">Terms &amp; Condition</a></li>
            </ul>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
          <div class="footer__section -links">
            <h5 class="footer-title">Keep In Touch</h5>

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
                    margin-top: -10px;
                    width: 30px;
                ">
              </div>

              <div class="contact-info__item__detail">
                <p><a href="https://www.tokopedia.com/aclcosm">
                  Tokopedia Official
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

@push('css-body')
<style>
.footer-one__header__logo a {
  display: flex;
  align-items: center;
  text-decoration: none;
}
.footer-one__header__logo a img {
  height: 70px;
  width: auto;
}
.footer-one__header__logo span {
  padding-left: 1rem;
  font-weight: 600;
  font-size: 20px;
  color: #008135;
}

</style>
@endpush
