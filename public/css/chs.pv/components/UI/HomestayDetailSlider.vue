<template>
  <b-carousel
    background="#FFF"
    :interval="5000"
    v-model="slide"
    @sliding-start="onSlideStart"
    @sliding-end="onSlideEnd"
    class="home-full"
  >
    <b-carousel-slide
      class="carousel-testimonial carousel-hs-detail"
      v-for="activity in activities"
      :key="activity.id"
      :style="{ backgroundImage: `url('${activity.banner_image}')` }"
    >
      <div class="captionLarge captionLarge--alt text-left">
        <h5 class="captionLarge-title text-uppercase">{{ activity.name }}</h5>
        <p class="captionLarge-desc m-t-10 m-b-10">{{ activity.tagline }}</p>
        <nuxt-link
          :to="{ name : 'experiences-experience', params : {experience : activity.slug }}"
          class="btn btn--brand btn--small text-uppercase m-t-10"
        >View</nuxt-link>
      </div>
    </b-carousel-slide>
  </b-carousel>
</template>

<script>
export default {
  props: ["activities"],
  data() {
    return {
      slide: 0,
      sliding: null
    };
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
.captionLarge {
  left: 3rem;
  bottom: 3rem;
}
.carousel-hs-detail .carousel-caption {
  left: 0;
  width: 100%;
  background: rgba(0, 0, 0, 0.5);
}
</style>
