<template>
  <div class="content content--alt">
    <section class="testimonial">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <CarouselTestimonial :slides="testimonialImage"/>
          </div>

          <div class="col-lg-6">
            <div class="test">
              <span class="chn-quote"></span>
              <p>{{testimonialStatement}}</p>
              <h6 class="brand title--small m-t-30">{{testimonialName}}</h6>
              <p class="m-t-0">2017/2018</p>
              <!-- <div class="carousel-testimonial-navs">
                <span
                  @click="SlideCarousel('prev')"
                  class="carousel-arrows chn-arrow-thin-left white"
                ></span>
                <span
                  @click="SlideCarousel('next')"
                  class="carousel-arrows chn-arrow-thin-right white"
                ></span>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import CarouselTestimonial from "~/components/UI/CarouselTestimonial";
export default {
  props: ["slides"],
  components: {
    CarouselTestimonial
  },
  watch: {
    slides() {
      this.testimonialData = this.slides;
    }
  },
  data() {
    return {
      testimonialData: this.slides,
      testimonialStatement: "Hello There",
      testimonialImage: "",
      testimonialName: "",
      dataIndex: 0
    };
  },
  methods: {
    SlideCarousel(value) {
      let self = this;
      if (value === "next") {
        if (this.dataIndex < this.testimonialData.length - 1) {
          console.log("next");
          this.dataIndex++;
          this.testimonialStatement = this.testimonialData[this.dataIndex].desc;
          this.testimonialImage = this.testimonialData[this.dataIndex].url;
        }
      }
      if (value === "prev") {
        if (this.dataIndex != 0) {
          console.log("prev");
          this.dataIndex--;
          this.testimonialStatement = this.testimonialData[this.dataIndex].desc;
          this.testimonialImage = this.testimonialData[this.dataIndex].url;
        }
      }
    }
  },
  mounted() {
    this.testimonialStatement = this.testimonialData[this.dataIndex].desc;
    this.testimonialImage = this.testimonialData[this.dataIndex].url;
    this.testimonialName = this.testimonialData[this.dataIndex].name;
  }
};
</script>


<style scoped>
.chn-quote {
  font-size: 75px;
  opacity: 0.1;
  display: inline-block;
  margin-bottom: 3rem;
}
.test {
  padding: 0 4rem 4rem 4rem;
  position: relative;
  height: 100%;
}
</style>
