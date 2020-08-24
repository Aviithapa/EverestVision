<template>
  <div class="of-hidden">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-6 row-desc d-flex align-items-center">
          <div class="div">
            <span class="title black title--small text-uppercase">
              Stay in our
              <span class="brand">Homestay</span>
            </span>
            <p
              class="m-t-30 m-b-30"
            >This experience is part of a community that also has amazing hosts who you can stay with overnight. We ensure that all homes in our network meet your comfort requirements.</p>
            <button class="btn btn--brand btn--small text-uppercase m-t-10">Book Now</button>
          </div>
        </div>
        <div class="row-image col-md-12 col-lg-6">
          <div
            class="home-full home-full--experience-listing"
            :style="{ backgroundImage: `url('${slides[0].url}')` }"
          >
            <div class="overlay overlay--bottom"></div>
            <div class="captionLarge captionLarge--alt">
              <h5 class="captionLarge-title text-uppercase">Biking to Mustang</h5>
              <p
                class="captionLarge-desc"
              >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod…</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import HomestayDetailSlider from "~/components/UI/HomestayDetailSlider";
export default {
  props: ["activities"],
  components: {
    HomestayDetailSlider
  },
  data() {
    return {
      slides: [
        {
          url:
            "https://explore.communityhomestay.com/images/mustang-banner.jpg",
          id: "1",
          desc: "Mustang Bon Community Homestay"
        },
        {
          url:
            "https://explore.communityhomestay.com/images/mustang-banner.jpg",
          id: "2",
          desc: "Random Quote 2"
        },
        {
          url:
            "https://explore.communityhomestay.com/images/mustang-banner.jpg",
          id: "3",
          desc: "Random Quote 3"
        },
        {
          url:
            "https://explore.communityhomestay.com/images/mustang-banner.jpg",
          id: "4",
          desc: "Random Quote 4"
        }
      ]
    };
  }
};
</script>

<style lang="scss" scoped>
.row-desc {
  & > div {
    max-width: 45rem;

    @media (max-width: 992px) {
      padding-top: 10rem;
    }
  }
}
.of-hidden {
  overflow: hidden;
}
.home-full--experience-listing {
  height: 55rem;
}
</style>
