<template>
  <div class="content">
    <section class="howYourTrip">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h3 class="title title--md text-left m-b-20 text-center" :class="{'hidden':homestay}">
              <span class="black">How Your Trip</span> Impacts our Community
            </h3>
            <h3
              v-if="homestay"
              class="title title--md text-left m-b-20 black text-center"
            >You Might Also Like</h3>
            <p
              class="asSeenIn-desc m-b-30"
            >We help reroute tourism deprived regions by enabling families across Nepal to host paying guests into their homes.</p>
          </div>
        </div>
      </div>
      <div class="container-fluid text-center">
        <div class="row">
          <div class="col-md-8 offset-md-2 text-center">
            <figure class="impact-home-img">
              <no-ssr>
                <progressive-img
                  class
                  src="impact-infographic-sm.jpg"
                  placeholder="placeholder.jpg"
                  :blur="30"
                />
              </no-ssr>
            </figure>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-3 card-impact__flexible-gutter">
            <div class="card-impact">
              <span class="card-impact__counter">1</span>
              <h5 class="m-b-20">We establish meaningful partnerships</h5>
              <p>We find rural communities across Nepal that are in need of economic support & connect them to our website</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3 card-impact__flexible-gutter">
            <div class="card-impact">
              <span class="card-impact__counter">2</span>
              <h5 class="m-b-20">We provide training and loans</h5>
              <p>We collaborate with NGO to provide local women the opportunity to become entrepreneurs & ready their homes to host guests</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3 card-impact__flexible-gutter">
            <div class="card-impact">
              <span class="card-impact__counter">3</span>
              <h5 class="m-b-20">You book with us</h5>
              <p>Once the purchase is made, we ensure the distribution in each community is made equality between the homes.</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3 card-impact__flexible-gutter">
            <div class="card-impact">
              <span class="card-impact__counter">4</span>
              <h5 class="m-b-20">We reinvest</h5>
              <p>We uplift our hosts economic status and reinvest into the communities overall growth</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
import Card from "~/components/UI/Card";
import NoSSR from "vue-no-ssr";
export default {
  props: ["slides", "isHomestay"],
  data() {
    return {
      homestay: this.isHomestay
    };
  },
  components: {
    Card,
    "no-ssr": NoSSR
  },
  methods: {
    handleClick() {
      alert("CLick vayo hai");
    }
  }
};
</script>

<style>
.VueCarousel {
  width: 100%;
}
.VueCarousel-navigation {
  height: 25px;
}
.VueCarousel-navigation-button {
  height: 25px !important;
  background: #f79b00 !important;
  color: #fff !important;
}
.VueCarousel-navigation-next {
  right: 2% !important;
}
.VueCarousel-navigation-prev {
  left: 2% !important;
}
.VueCarousel-navigation--disabled {
  display: none;
}
</style>
<style scoped>
.howYourTrip {
  /* overflow-x: hidden; */
}
@media (max-width: 1199px) {
  .row-translated {
    transform: translateX(0) !important;
  }
}
</style>
