<template>
  <div class="review-row m-b-30">
    <div class="review-row-person">
      <img class="review-row-icon m-r-15" src="~/assets/images/man-user.svg">
      <span class="title title--xxs black d-inline-block m-r-10 m-b-0">{{ reviewer }}</span>
      <span class="title-xxxs">{{ date }}</span>
    </div>
    <div class="review-row-desc">
      <p v-html="text"></p>
    </div>
  </div>
</template>

<script>
export default {
  props: ["text", "reviewer", "rating", "date"]
};
</script>

<style lang="scss" scoped>
.review-row {
  &-icon {
    width: 6.8rem;
    height: 6.8rem;
    border-radius: 50%;
  }
  &-desc {
    width: 89%;
    margin-left: auto;
    @media (max-width: 1200px) {
      width: 87%;
    }
    @media (max-width: 767px) {
      width: 100%;
    }
  }
  &-person {
    display: flex;
    flex-direction: row;
    align-items: center;

    @media (max-width: 767px) {
      flex-direction: column;
      align-items: flex-start;
    }
  }
  @media (max-width: 767px) {
    justify-content: flex-start;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    text-align: left;
  }
}
.title-xxxs {
  font-size: 13px;
  color: #5e5e5e;
}
</style>

