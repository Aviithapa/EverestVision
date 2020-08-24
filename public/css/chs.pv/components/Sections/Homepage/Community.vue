<template>
  <div class="content content--green">
    <section class="asSeenIn">
      <div class>
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <h3 class="title title--md text-left m-b-20 text-center">
                <span class="black">#doitlocal</span>
              </h3>
              <p
                class="asSeenIn-desc"
              >Explore our Homestays and Experiences through the eyes of our guests</p>
            </div>
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
                    <a :href="item.post_url" target="_blank">
                      <img :src="item.thumbnail_url">
                    </a>
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
  props: ["images"]
};
</script>


<style scoped>
@import "~/assets/styles/scss/modules/_masonry.scss";
.hidden {
  display: none;
}
</style>
