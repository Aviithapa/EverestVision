<template>
  <div>
    <div
      :class="{'customCard--large' : large}"
      class="customCard"
      :style="{ 'backgroundImage': `url('${slide}')` }"
    >
      <span v-if="isHomestay" class="customCard-caption b-72">{{ id }}</span>
      <span
        class="customCard-caption d-inline-block"
        :class="{'brand p-t-10 p-b-10 b-40':isHomestay}"
      >{{ desc }}</span>
      <span v-if="isHomestay" class="customCard-caption b-15">{{ price }}</span>
      <div class="customCard-overlay"></div>
      <div class="captionLarge" v-if="large">
        <h5 class="captionLarge-title">Homestays</h5>
        <p class="captionLarge-desc">Live with a family in an authentic Nepali home.</p>
        <button class="text-uppercase btn btn--brand btn--small btn--experience">view all</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["slide", "desc", "isLarge", "price", "homestay", "id"],
  watch: {
    isLarge() {
      this.large = this.isLarge;
    }
  },
  data() {
    return {
      localSlides: this.slide,
      localDesc: this.desc,
      large: this.isLarge,
      isHomestay: this.homestay
    };
  },
  watch: {
    slides() {
      this.localSlides = this.slide;
    }
  }
};
</script>

<style scoped>
.b-40 {
  bottom: 4rem;
}
.b-15 {
  bottom: 1.5rem;
  font-size: 1.5rem;
}
.b-72 {
  bottom: 8rem;
  font-size: 1.5rem;
}
</style>
