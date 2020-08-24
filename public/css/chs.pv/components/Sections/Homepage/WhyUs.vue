<template>
  <section class="content content--alt content--green why_travel">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-6">
          <h3 class="title title--md text-left m-b-20">
            <span class="black">Why</span> Travel With Us?
          </h3>
          <p
            class="why_travel-desc m-b-20"
          >We believe in using tourism as a force for good. Our experiences are designed with the goal of leaving positive impact on the destination's people and environment. Join a family, experience the locality and make meaningful memories.</p>
          <a href="https://www.facebook.com/communityhomestay/" target="_blank">
            <b-button class="btn btn--brand btn--medium text-uppercase">Learn More</b-button>
          </a>
        </div>
        <div class="col-md-12 col-lg-6">
          <no-ssr>
            <video
              width="100%"
              height="100%"
              class="home-full home-full--alt"
              controls
              autoplay
              id="introVideo"
              ref="introVideo"
            >
              <source
                type="video/mp4"
                src="https://s3.ap-south-1.amazonaws.com/chsfiles/video/CH_Video.mp4"
              >
              <source
                type="video/webm"
                src="https://s3.ap-south-1.amazonaws.com/chsfiles/video/CH_Video.webm"
              >
            </video>
          </no-ssr>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import LoaderButton from "~/components/UI/LoaderButton";
export default {
  data() {
    return {};
  },
  components: {
    LoaderButton
  },
  methods: {},
  mounted() {
    if (process.browser) {
    }
  }
};
</script>


<style lang="scss">
@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
.loader {
  border-radius: 50%;
  width: 18px;
  height: 18px;
  border: 0.25rem solid #ccc;
  border-top-color: #fff;
  animation: spin 1s infinite linear;
  display: inline-block;
  margin-bottom: -2px;
}
.min-height {
  min-height: 50rem;
}
.why-video {
  width: 100%;
  height: 100%;
}
</style>
