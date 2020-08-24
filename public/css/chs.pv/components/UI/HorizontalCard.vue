<template>
  <div class="horizontalCard" id="horizontalCard">
    <div class="horizontalCard-image">
      <no-ssr>
        <progressive-background
          class="horizontalCard-image"
          :src="`${photo}`"
          placeholder="placeholder.jpg"
          no-ratio
        />
      </no-ssr>
    </div>
    <div class="horizontalCard-desc">
      <div class="horizontalCard-desc-top m-b-10">
        <div class="div">
          <nuxt-link
            v-if="isHomestayListing"
            :to="{ name :'homestays-homestay', params : {homestay : details.slug}}"
          >
            <h6 class="title title--xs black m-b-0 lh-auto text-left truncate-1">{{ details.name }}</h6>
          </nuxt-link>
          <nuxt-link
            v-if="isExperienceListing"
            :to="{ name :'experiences-experience', params : {experience : details.slug}}"
          >
            <h6 class="title title--xs black m-b-0 lh-auto text-left truncate-1">{{ details.name }}</h6>
          </nuxt-link>
          <span
            class="title--xxxs fade-color"
            v-if="details.hosts && details.hosts.length"
          >({{ details.hosts.length }}) Families</span>
        </div>
        <h6 class="title title--price m-b-0 lh-auto m-l-auto">${{ usdPrice }}</h6>
        <p v-if="isHomestayListing" class="m-b-0 lh-auto">/guest/night</p>
      </div>
      <p
        class="title--xxs lh-25 m-b-20 truncate-3"
        style="-webkit-box-orient: vertical;"
      >{{ details.description_excerpt }}</p>
      <div class="horizontalCard-desc-top horizontalCard-desc-bottom m-b-10">
        <span class="title--xxxs fade-color">
          <i class="chn-location m-r-5"></i>
          {{ details.location ? details.location.name : ""}}
        </span>
        <!-- <span class="title--xxxs fade-color horizontalCard__guest">
          <i class="chn-people"></i> 1-30 Guest
        </span>-->
      </div>
    </div>
    <nuxt-link
      v-if="isHomestayListing"
      :to="{ name :'homestays-homestay', params : {homestay : details.slug}}"
      class="detail-link"
    ></nuxt-link>
    <nuxt-link
      v-if="isExperienceListing"
      :to="{ name :'experiences-experience', params : {experience : details.slug}}"
      class="detail-link"
    ></nuxt-link>
  </div>
</template>

<script>
export default {
  name: "homestay-list",
  props: ["homestay", "isHomestay", "isActivity"],
  computed: {
    photo() {
      return this.details.banner_image;
    },
    usdPrice() {
      return this.details.prices.filter(price => price.currency === "USD")[0]
        .group_prices[0].price;
    }
  },
  watch: {
    homestay() {
      this.details = this.homestay;
    }
  },
  data() {
    return {
      details: this.homestay,
      isHomestayListing: this.isHomestay,
      isExperienceListing: this.isActivity
    };
  }
};
</script>

<style lang="scss" scoped>
.detail-link {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 10;
  cursor: pointer;
}
.title {
  font-size: 1.8rem;
}
.horizontalCard-image {
  position: relative;
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
}
.chn-bookmarks {
  position: absolute;
  font-size: 2.8rem;
  top: 1.5rem;
  left: 1.5rem;
  color: #fff;
}

@media (max-width: 768px) {
  .horizontalCard-desc-bottom {
    flex-direction: column;
  }
}

.horizontalCard__guest {
  min-width: 100px;
}
.horizontalCard-desc-bottom {
  justify-content: space-between;
}

.truncate-3 {
  -webkit-box-orient: vertical;
}
@media (max-width: 992px) {
  .horizontalCard-desc-bottom {
    flex-direction: column;
    align-items: flex-start;
  }
  .horizontalCard__guest {
    min-width: auto;
  }
}
</style>
