<template>
  <div>
    <b-carousel
      id="carousel1"
      :interval="0"
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
          :src="`${slider.path}`"
          placeholder="https://explore.communityhomestay.com/images/panauti-small.jpeg"
          fallback="https://explore.communityhomestay.com/images/seasonal-activities.jpeg"
          @onLoad="onLoad"
          :blur="50"
        />
      </no-ssr>
      <div
        class="overlay overlay--banner overlay--top"
        :class="{'overlay--bannerShow':overlayShow}"
      ></div>
      <div
        class="overlay overlay--banner overlay--bottom"
        :class="{'overlay--bannerShow':overlayShow}"
      ></div>
      <div class="carousel-content carousel-content--alt carousel-width">
        <h1
          class="title title--large white text-left carousel-content__title-inner"
        >{{ homestay.name }} - {{homestay.tagline}}</h1>
        <p
          class="title title--xs white text-left m-t-20 carousel-content__desc-inner d-none d-sm-block"
        >{{ homestay.short_description ? homestay.short_description:""}}</p>
        <div class="carousel-desc d-flex align-items-center flex-wrap">
          <span class="base white p-r-35 d-inline-block">
            <span class="chn-location brand"></span>
            &nbsp; {{ homestay.location ? homestay.location.name : "" }}
          </span>
        </div>
      </div>
    </b-carousel>
  </div>
</template>

<script>
export default {
  props: [
    "homestay",
    "slides",
    "isMainSlider",
    "homestays",
    "activities",
    "isSmall",
    "isHomestayTitle"
  ],
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
      this.homestayOptions = this.homestays;
    }
  },
  data() {
    return {
      localSlides: this.slides,
      slide: 0,
      sliding: null,
      isMain: this.isMainSlider,
      small: this.isSmall,
      homestayTitle: this.isHomestayTitle,
      selectedActivity: null,
      selectedHomestay: null,
      homestayOptions: this.homestays,
      activityOptions: this.activities,
      overlayShow: false
    };
  },
  methods: {
    homestaySelected() {
      this.$emit("homestay-selected", this.selectedHomestay);
    },
    onSlideStart(slide) {
      this.sliding = true;
    },
    onSlideEnd(slide) {
      this.sliding = false;
    },
    onLoad() {
      this.overlayShow = true;
    }
  },
  mounted() {
    if (this.homestayTitle) {
      // const container = document.getElementsByClassName("container")[0];
      // const containerOffset = container.offsetLeft;
      // const content = document.getElementsByClassName(
      //   "carousel-content--alt"
      // )[0];
      // content.style.left = containerOffset + "px";
    }
  }
};
</script>

<style scoped>
.carousel-item {
  height: 100vh;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
}
.carousel-form {
  margin-bottom: 13rem;
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
.rating-icon {
  font-size: 3rem;
  color: #f79b00;
}
.rating {
  margin-left: 3.5rem;
}
.res-width {
  max-width: 50%;
}
.carousel-width {
  max-width: 60rem;
}
@media (max-width: 992px) {
  .rating {
    flex-basis: 100%;
    margin-left: 0;
  }
  .res-width {
    max-width: none;
  }
  .carousel-width {
    left: 3rem;
  }
}
@media (max-width: 767px) {
  .carousel-width {
    max-width: 100%;
    left: 0;
    padding: 0 30px;
  }
}
</style>
