<template>
  <div>
    <no-ssr>
      <progressive-background
        class="customCard customCard--small"
        :src="`${slide}`"
        placeholder="https://explore.communityhomestay.com/images/panauti-small.jpeg"
        fallback="https://explore.communityhomestay.com/images/seasonal-activities.jpeg"
        :blur="50"
      >
        <div slot="content">
          <span class="customCard-caption d-inline-block">{{ desc }}</span>
          <div class="customCard-overlay"></div>
        </div>
      </progressive-background>
    </no-ssr>
  </div>
</template>

<script>
export default {
  props: ["slide", "desc"],
  watch: {},
  data() {
    return {
      localSlides: this.slide,
      localDesc: this.desc
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
@media (max-width: 992px) {
  .customCard {
    width: 100% !important;
  }
}
</style>

<style lang="scss">
.customCard--small .progressive-background-slot,
.customCard--large .progressive-background-slot {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>
