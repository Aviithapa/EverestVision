<template>
  <div class="content content--green" :class="{'content--white':!isWhite}">
    <section class="asSeenIn">
      <div class>
        <div class="row">
          <div class="col-md-12 text-center">
            <h3 class="title title--md text-left m-b-20 text-center">
              <span class="black">{{this.name}}</span>
              in pictures
            </h3>
            <p
              v-if="this.isHomestayPage"
              class="asSeenIn-desc"
            >A few glimpses of what is waiting for you</p>
            <p v-if="this.isActivityPage" class="asSeenIn-desc">More coming soon</p>
          </div>
        </div>
        <div>
          <div>
            <div class="container-custom">
              <no-ssr>
                <div
                  v-masonry
                  transition-duration="0.5s"
                  item-selector=".item"
                  class="masonry-container"
                  fit-width="true"
                  horizontal-order="true"
                >
                  <div
                    v-masonry-tile
                    class="item masonry-item"
                    v-for="(item, index) in images"
                    :key="index"
                  >
                    <img :src="item.path">
                  </div>
                </div>
              </no-ssr>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
export default {
  props: ["images", "name", "isActivityPage", "isHomestayPage", "isWhite"],
  data() {
    return {
      title: ""
    };
  },
  computed: {}
};
</script>


<style scoped>
@import "~/assets/styles/scss/modules/_masonry.scss";
.hidden {
  display: none;
}
</style>
