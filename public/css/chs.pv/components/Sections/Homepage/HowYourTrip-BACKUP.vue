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
              class="asSeenIn-desc"
            >We help reroute tourism deprived regions by enabling families across Nepal to host paying guests into their homes.</p>
          </div>
        </div>
      </div>
      <div class="container-fluid carousel-vue text-center">
        <div class="row">
          <no-ssr placeholder="...Loading">
            <carousel
              class="row-translated"
              :navigationEnabled="true"
              navigationPrevLabel="<--"
              navigationNextLabel="-->"
              :paginationEnabled="false"
              :scrollPerPage="false"
              :perPageCustom="[[320, 1], [768, 3], [1024, 4],  [1440, 5]]"
              :dots="false"
            >
              <slide v-for="slide in slides" :key="slide.id" @click="handleClick">
                <Card
                  :slide="slide.url"
                  :desc="slide.desc"
                  :price="slide.price"
                  :homestay="homestay"
                  :id="slide.id"
                />
              </slide>
            </carousel>
          </no-ssr>
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
  overflow-x: hidden;
}
@media (max-width: 1199px) {
  .row-translated {
    transform: translateX(0) !important;
  }
}
</style>
