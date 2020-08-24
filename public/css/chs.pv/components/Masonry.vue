<template>
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
              v-for="(item, index) in slides"
              :key="index"
            >
              <span class="white title-xs masonry-caption">
                <span class="chn-instagram"></span>
                &nbsp;&nbsp;{{ item.desc }}
              </span>
              <div class="overlay overlay--insta"></div>
              <img :src="item.url">
            </div>
          </div>
        </no-ssr>
      </div>
    </div>
  </div>
</template>

<script>
import NoSSR from "vue-no-ssr";

export default {
  components: {
    "no-ssr": NoSSR
  },
  props: ["slides"],
  data() {
    return {
      selector: ".grid",
      options: {
        columnWidth: ".grid-sizer",
        percentPosition: true,
        gutter: 0,
        itemSelector: ".item"
      },
      items: [
        {
          id: "1",
          url: "https://explore.communityhomestay.com/images/barauli-jeep.jpeg"
        },
        {
          id: "2",
          url: "https://explore.communityhomestay.com/images/ilam-tea.jpeg"
        },
        {
          id: "3",
          url: "https://explore.communityhomestay.com/images/palpa-rani.jpeg"
        },
        {
          id: "4",
          url: "https://explore.communityhomestay.com/images/panauti.jpeg"
        },
        {
          id: "5",
          url: "https://explore.communityhomestay.com/images/mustang-women.jpeg"
        },
        {
          id: "5",
          url: "https://explore.communityhomestay.com/images/nuwakot-women.jpeg"
        },
        {
          id: "5",
          url:
            "https://explore.communityhomestay.com/images/nagarkot-women.jpeg"
        }
      ]
    };
  },
  mounted() {
    if (typeof this.$redrawVueMasonry === "function") {
      this.$redrawVueMasonry();
    }
  }
};
</script>

<style scoped lang="scss">
  @import "~/assets/styles/scss/modules/_masonry.scss";
</style>
