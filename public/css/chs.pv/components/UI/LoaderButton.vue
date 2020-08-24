<template>
  <b-button
    @click="$emit('click')"
    class="btn btn--brand text-uppercase"
    :class="`${this.size} ${this.fullwidth ? 'w-100':''}`"
  >
    <span v-if="loading" class="loader"></span>
    <span :class="`chn-${this.icon}`"></span>
    {{ this.btnName }}
  </b-button>
</template>

<script>
export default {
  props: ["btnName", "fullwidth", "size", "icon", "loading"],
};
</script>

