<template>
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
          <h3 class="text-uppercase footer-title">company</h3>
          <p>
            <nuxt-link to="/homestays">Homestays</nuxt-link>
          </p>
          <p>
            <nuxt-link to="/experiences">Experiences</nuxt-link>
          </p>
          <p>
            Trails
            <span class="coming-soon">(coming soon)</span>
          </p>
          <p>
            Impact
            <span class="coming-soon">(coming soon)</span>
          </p>
          <!-- <p>
            Guidebook
            <span class="coming-soon">(coming soon)</span>
          </p>-->
          <!-- <p>About <span class="coming-soon">(coming soon)</span></p>
          <p>Frequently Asked Questions <span class="coming-soon">(coming soon)</span></p>
          <p>Terms & Conditions <span class="coming-soon">(coming soon)</span></p>
          <p>E-broucher <span class="coming-soon">(coming soon)</span></p>
          <p>Press and Print <span class="coming-soon">(coming soon)</span></p>-->
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <h3 class="text-uppercase footer-title">Discover</h3>
          <p>
            Our Story
            <span class="coming-soon">(coming soon)</span>
          </p>
          <p>
            Why Host
            <span class="coming-soon">(coming soon)</span>
          </p>
          <!-- <p>
            Guidebook,Stories & tales
            <span class="coming-soon">(coming soon)</span>
          </p>-->
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <h3 class="text-uppercase footer-title">Connect</h3>
          <p>
            Contact
            <span class="coming-soon">(coming soon)</span>
          </p>
          <p>
            Careers
            <span class="coming-soon">(coming soon)</span>
          </p>
          <p>
            Partner With Us
            <span class="coming-soon">(coming soon)</span>
          </p>
          <p>
            Intern With Us
            <span class="coming-soon">(coming soon)</span>
          </p>
          <!-- <p>
            Discuss possible partnerships
            <span class="coming-soon">(coming soon)</span>
          </p>-->
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <h3 class="text-uppercase footer-title">Follow Us</h3>
          <p class="m-b-30">
            <a
              href="mailto:info@communityhomestay.com"
              class="link-brand"
            >info@communityhomestay.com</a>
          </p>
          <ul class="nav_top m-b-0 align-items-center pl-0 header-social social-footer">
            <li>
              <b-link href="https://www.facebook.com/communityhomestay/" target="_blank">
                <span class="social-footer chn-facebook"></span>
              </b-link>
            </li>
            <li>
              <b-link href="https://twitter.com/CH_Homestay" target="_blank">
                <span class="social-footer chn-twitter"></span>
              </b-link>
            </li>
            <li>
              <b-link href="http://www.pinterest.com/CH_Homestay" target="_blank">
                <span class="social-footer chn-pinterest"></span>
              </b-link>
            </li>
            <li>
              <b-link
                href="https://www.linkedin.com/company/communityhomestay-com/"
                target="_blank"
              >
                <span class="social-footer chn-linkedin"></span>
              </b-link>
            </li>
            <li>
              <b-link href="https://www.instagram.com/community_homestay/" target="_blank">
                <span class="social-footer chn-instagram"></span>
              </b-link>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="hr hr--footer"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <p>&copy; {{ new Date().getFullYear() }} Community Homestay Network, Inc.</p>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  data() {
    return {
      currentYear: new Date().getFullYear()
    };
  }
};
</script>
