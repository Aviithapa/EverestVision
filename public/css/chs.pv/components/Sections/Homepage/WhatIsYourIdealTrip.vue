<template>
  <div class="content content--green">
    <div class="what">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">
            <h3 class="title title--md text-left m-b-20 text-center">
              <span class="black">What's Your</span> Ideal Trip?
            </h3>
            <p
              class="asSeenIn-desc"
            >Hike through the Himalayas, dance with locals, learn pottery or spot tigers in the jungle. Find your ideal trip below.</p>
          </div>
        </div>
        <div class="row">
          <div v-for="slide in slides" class="col-12 col-md-6 col-lg-3" :key="slide.id">
            <CardSmall :slide="slide.url" :desc="slide.desc" :isSmall="true"/>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CardSmall from "~/components/UI/CardSmall";
export default {
  props: ["slides"],
  components: {
    CardSmall
  }
};
</script>

<style scoped>
img {
  max-width: 100%;
}
</style>
