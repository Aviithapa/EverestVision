<template>
  <div>
    <no-ssr>
      <progressive-background
        class="customCard customCard--large"
        :src="`${details.url}`"
        placeholder="https://explore.communityhomestay.com/images/panauti-small.jpeg"
        fallback="https://explore.communityhomestay.com/images/seasonal-activities.jpeg"
        :blur="50"
      >
        <div slot="content">
          <div class="customCard-overlay"></div>
          <div class="captionLarge" v-if="large">
            <h5 class="captionLarge-title">{{details.id}}</h5>
            <p class="captionLarge-desc">{{details.desc}}</p>
            <nuxt-link :to="page">
              <button class="text-uppercase btn btn--brand btn--small btn--experience">view all</button>
            </nuxt-link>
          </div>
        </div>
      </progressive-background>
    </no-ssr>
  </div>
</template>

<script>
export default {
  props: ["isLarge", "information", "link"],
  watch: {
    isLarge() {
      this.large = this.isLarge;
    }
  },
  data() {
    return {
      large: this.isLarge,
      details: this.information,
      page: this.link
    };
  },
  watch: {
    slides() {
      this.details = this.information;
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
