<template>
  <div class="content content--green">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-12">
          <span class="title black title--large d-block text-left">Reviews</span>
          <br>
          <span class="mw290 title black title--xs lh-auto d-inline-block text-left">
            Few
            <span class="brand">Reviews</span> from folks just like you.
          </span>
        </div>
        <div class="col-lg-8 col-md-12">
          <Review v-for="(review, key) in reviews" :text="review.text" :reviewer="review.reviewer" :rating="review.rating" :date="review.date" :key="key"/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Review from "~/components/UI/Review";
export default {
  props : ["reviews"],
  components: {
    Review
  }
};
</script>

<style lang="scss" scoped>
.mw290 {
  max-width: 29rem;
}
.chn-arrow-down {
  font-size: 1rem;
}
</style>
