<template>
  <div>
    <b-carousel
      id="carousel2"
      background="#FFF"
      :interval="0"
      v-model="slide"
      @sliding-start="onSlideStart"
      @sliding-end="onSlideEnd"
      :class="{'home-full':homestay}"
    >
      <b-carousel-slide class="carousel-testimonial" :key="slider.id" v-for="slider in localSlides">
        <img slot="img" :src="slider.url" :class="{'full-width':full}" height="100%" width="100%">
      </b-carousel-slide>
      <div v-if="this.overlay" class="overlay overlay--full"></div>
      <div v-if="this.experience" class="overlay overlay--bottom"></div>

      <div class="homestay-caption" :class="{'hidden':!homestayCap}">
        <h1 class="title title--small white">Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing</h1>
        <p
          class="asSeenIn-desc white m-b-0"
        >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pretium pretium tempor. Ut eget imperdiet neque.</p>
        <button class="btn btn--brand btn--small text-uppercase m-t-20">Read In Guidebook</button>
      </div>

      <div class="captionLarge" v-if="experience">
        <h5 class="captionLarge-title text-uppercase">Homestays</h5>
        <p
          class="captionLarge-desc"
        >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod…</p>
        <button class="btn btn--brand btn--small text-uppercase">Book Now</button>
      </div>
      <div class="carousel-homestay-experience" :class="{'rightAlt':navChange}">
        <span @click="SlideCarousel('prev')" class="carousel-arrows chn-arrow-thin-left white"></span>
        <span @click="SlideCarousel('next')" class="carousel-arrows chn-arrow-thin-right white"></span>
      </div>
    </b-carousel>
  </div>
</template>

<script>
export default {
  props: [
    "activities",
    "caption",
    "fullWidth",
    "isHomestay",
    "overlay",
    "homestayCaption",
    "isExperience",
    "navigationChange"
  ],
  data() {
    return {
      localSlides: this.slides,
      slide: 0,
      sliding: null,
      text: this.caption,
      full: this.fullWidth,
      homestay: this.isHomestay,
      homestayCap: this.homestayCaption,
      experience: this.isExperience,
      navChange: this.navigationChange
    };
  },
  watch: {
    slides() {
      this.localSlides = this.slides;
    }
  },
  methods: {
    onSlideStart(slide) {
      this.sliding = true;
    },
    onSlideEnd(slide) {
      this.sliding = false;
    }
  }
};
</script>
<style>
.carousel-testimonial {
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  height: 55rem;
  width: 100%;
  /* display: flex; */
  flex-direction: row;
  align-items: center;
  /* width: 50%; */
}
.carousel-testimonial:focus {
  outline: none;
}
/* .carousel-testimonial img {
  width: 50%;
} */
.carousel-testimonial .carousel-caption {
  position: absolute;
  top: 0%;
  left: 0%;
  transform: translateY(0%);
  bottom: auto;
  right: auto;
  height: 100%;
  padding-top: 0;
  padding-bottom: 0;
}
.carousel-testimonial .carousel-caption .test {
  text-align: left;
  max-width: 508px;
  height: 100%;
}
.carousel-testimonial .carousel-caption img {
  width: 75px;
}
.carousel-testimonial .carousel-caption p {
  margin: 3rem 0;
  font-size: 1.8rem;
}
.hidden {
  display: none;
}
.full-width {
  width: 100% !important;
}
.home-full {
  left: 0;
  margin-right: -50vw;
  max-width: 100vw;
  position: relative;
  right: 50%;
  width: 50vw;
}
@media (max-width: 992px) {
  .home-full {
    width: 100%;
    margin-right: auto;
    margin-top: 4rem;
  }
}
.home-full-left {
  right: 0;
  margin-left: -50vw;
  max-width: 100vw;
  position: relative;
  left: 100%;
  width: 50vw;
}
.homestay-caption {
  position: absolute;
  width: 100%;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  z-index: 99;
}
.rightAlt {
  right: 5px;
}
</style>
