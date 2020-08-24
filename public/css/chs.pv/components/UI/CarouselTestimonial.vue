<template>
  <div>
    <b-carousel
      ref="productDetails"
      id="carousel2"
      background="#FFF"
      v-model="slide"
      :interval="0"
      @sliding-start="onSlideStart"
      @sliding-end="onSlideEnd"
      class="home-full-left"
    >
      <no-ssr>
        <progressive-img
          class="full-width testimonial-full"
          :src="localSlides"
          placeholder="placeholder.jpg"
          :blur="30"
        />
      </no-ssr>
    </b-carousel>
  </div>
</template>

<script>
export default {
  props: ["slides"],
  data() {
    return {
      localSlides: this.slides,
      slide: 0,
      sliding: null
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
  /* height: 55rem; */
  width: 100%;
  /* display: flex; */
  flex-direction: row;
  align-items: center;
  /* width: 50%; */
}
.carousel-testimonial:focus {
  outline: none;
}
.carousel-testimonial img {
  max-width: 100%;
}

.home-full {
  left: 0;
  margin-right: -50vw;
  max-width: 100vw !important;
  position: relative;
  right: 50%;
  width: 50vw;
}

.home-full--alt {
  width: 49vw;
}
@media (max-width: 992px) {
  .home-full {
    width: 100%;
    margin-right: auto;
    margin-top: 4rem;
  }
  .home-full--alt {
    width: 100%;
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
@media (max-width: 992px) {
  .home-full-left {
    margin-left: auto;
    margin-bottom: 4rem;
    max-width: 100vw;
    position: relative;
    left: 0;
    width: 100%;
  }
}
.testimonial-full {
  max-width: none !important;
  max-height: 85vh;
}
</style>
