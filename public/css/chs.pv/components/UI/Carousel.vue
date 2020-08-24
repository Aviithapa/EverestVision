<template>
  <div>
    <b-carousel
      id="carousel1"
      :interval="5000"
      img-height="100%"
      v-model="slide"
      @sliding-start="onSlideStart"
      @sliding-end="onSlideEnd"
      class="banner-carousel"
    >
      <no-ssr>
        <progressive-background
          class="carousel-item"
          :class="{'small':small}"
          :key="slider.id"
          v-for="slider in localSlides"
          :src="`${slider.url}`"
          placeholder="placeholder.jpg"
          fallback="https://explore.communityhomestay.com/images/seasonal-activities.jpeg"
          @onLoad="onLoad"
          :blur="50"
        />
      </no-ssr>

      <div
        class="overlay overlay--top overlay--banner"
        :class="{'overlay--bannerShow':overlayShow}"
      ></div>
      <div
        class="overlay overlay--bottom overlay--banner"
        :class="{'overlay--bannerShow':overlayShow}"
      ></div>
      <div class="carousel-content" v-if="isMain">
        <h1 class="white text-uppercase title title--xl carousel-content-title">Do it the local way</h1>
        <div class="carousel-form d-flex justify-content-center">
          <no-ssr>
            <v-select
              v-model="selectedHomestay"
              :options="homestayOptions"
              placeholder="Where to stay"
              class="v-select--brand"
              label="nameWithTags"
              value="slug"
            >
              <template slot="option" slot-scope="options">
                <b>{{ options.name }}</b>
                <span
                  class="m-l-5 d-inline-block"
                >{{ "("+options.tags.map(tag => tag.name).join(", ") + ")" }}</span>
              </template>
            </v-select>
          </no-ssr>
          <button
            class="btn btn--small btn--experience btn--brand text-uppercase m-l-10 m-r-10"
            @click="goToHomestay"
          >View</button>
        </div>
        <div class="row d-none d-xl-block">
          <div class="col text-center">
            <span class="title explore white" @click="displayMap">
              <i class="chn-location"></i> Explore in a map
            </span>
          </div>
        </div>
        <div class="carousel-icons d-flex align-items-center justify-content-center">
          <span class="white title--xxs">supported by</span>
          <img src="booking-booster.png">
        </div>
      </div>
      <div class="carousel-content carousel-content--alt" v-if="homestay">
        <h1 class="title title--large white">Mustang Bon Community Homestay</h1>
        <span class="base white p-r-35">Annapurna, Nepal</span>
        <span class="base white">7-8 Hours</span>
      </div>
      <Map :class="{'showMap':showMap}" v-on:closeMap="close"/>
    </b-carousel>
  </div>
</template>

<script>
import Map from "~/components/UI/Map";

export default {
  props: [
    "slides",
    "isMainSlider",
    "homestays",
    "activities",
    "isSmall",
    "isHomestayTitle"
  ],
  components: {
    Map
  },
  watch: {
    slides() {
      this.localSlides = this.slides;
    },
    activities: {
      handler() {
        this.activityOptions = this.activities;
      },
      deep: true
    },
    homestays() {
      this.homestayOptions = this.homestays.map(homestay => {
        let name = homestay.name.replace("Community Homestay", "");
        homestay.nameWithTags =
          name + "(" + homestay.tags.map(tag => tag.name).join(", ") + ")";
        return homestay;
      });
    }
  },
  data() {
    return {
      localSlides: this.slides,
      slide: 0,
      sliding: null,
      isMain: this.isMainSlider,
      small: this.isSmall,
      homestay: this.isHomestayTitle,
      overlayShow: false,

      selectedActivity: null,
      selectedHomestay: null,
      homestayOptions: this.homestays.map(homestay => {
        let name = homestay.name.replace("Community Homestay", "");
        homestay.nameWithTags =
          name +
          " " +
          "(" +
          homestay.tags.map(tag => tag.name).join(", ") +
          ")";
        return homestay;
      }),
      activityOptions: this.activities,
      showMap: false
    };
  },
  methods: {
    goToHomestay() {
      this.$router.push({
        name: "homestays-homestay",
        params: { homestay: this.selectedHomestay.slug }
      });
    },
    onSlideStart(slide) {
      this.sliding = true;
    },
    onSlideEnd(slide) {
      this.sliding = false;
    },
    displayMap() {
      this.showMap = true;
    },
    close() {
      this.showMap = false;
    },
    onLoad() {
      this.overlayShow = true;
    }
  },
  mounted() {
    if (this.homestay) {
      const container = document.getElementsByClassName("container")[0];
      const containerOffset = container.offsetLeft;
      const content = document.getElementsByClassName(
        "carousel-content--alt"
      )[0];
      content.style.left = containerOffset + "px";
    }
  }
};
</script>

<style lang="scss" scoped>
.carousel-item {
  height: 100vh;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
}

.carousel-form {
  margin-bottom: 3rem;
}

@media (max-width: 992px) {
  .carousel-form {
    margin-bottom: 6rem;
  }
}

.carousel-icons img {
  height: 6rem;
}

.small {
  height: 55rem;
}

.carousel-content--alt {
  transform: none;
  left: 11rem;
}

.explore {
  cursor: pointer;
  transition: all 0.5s ease-in-out;

  &:hover {
    color: #f79b00;
  }
}
</style>
