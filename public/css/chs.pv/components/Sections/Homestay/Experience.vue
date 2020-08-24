<template>
  <div class="of-hidden" v-if="activities.length">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-6 row-desc d-flex align-items-center">
          <div class="div">
            <span class="title black title--small text-uppercase">
              <span class="brand">Experience</span>&nbsp;Local Activities
            </span>
            <p
              class="m-t-30 m-b-30"
            >Each community has authentic and local activities you can participate in. Hike through the Himalayas, dance with locals, learn pottery or spot tigers in the jungle - you will get to further explore Nepal’s culture with your local hosts.</p>
            <button
              class="btn btn--brand btn--small text-uppercase m-t-10"
              @click="goToExperiences"
            >Book Now</button>
          </div>
        </div>
        <div class="row-image col-md-12 col-lg-6">
          <HomestayDetailSlider :overlay="true" :activities="activities" caption="false"/>
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
  methods: {
    goToExperiences() {
      this.$router.push({ name: "experiences" });
    }
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
</style>
