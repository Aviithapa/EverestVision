<template>
  <div class="content">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-12 col-lg-6">
          <no-ssr>
            <progressive-img
              :src="image"
              placeholder="https://explore.communityhomestay.com/images/panauti-small.jpeg"
              :blur="30"
              class="host-img--limit"
            />
          </no-ssr>
        </div>
        <div class="col-12 col-lg-5 offset-lg-1 offset-sm-0">
          <h4 class="title title--medium black text-left margin-4-res">
            About Your
            <span class="brand">Host</span>
          </h4>
          <span class="p" v-html="text"></span>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["image", "text"]
};
</script>
<style lang="scss" scoped>
.row {
  .col-12 {
    img {
      width: 100%;
      height: auto;
    }
  }
}
.host-img--limit {
  max-height: 420px;
}
</style>
