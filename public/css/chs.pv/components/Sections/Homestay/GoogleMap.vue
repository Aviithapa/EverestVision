<template>
  <GmapMap :center="center" :zoom="8" class="gMap">
    <GmapMarker
      :key="index"
      v-for="(m, index) in markers"
      :position="m.position"
      :clickable="true"
      :draggable="true"
      @click="center=m.position"
    />
    <div class="gMap-desc" v-if="showDialog">
      <span class="gMap-close" @click="closeDialog">
        <b>X</b>
      </span>
      <h2 class="text-left title title--small dark m-b-20">
        We'll
        <span class="brand">help</span> you get there
      </h2>
      <p v-html="helpText"></p>
    </div>
    <div class="gmapOverlay" v-if="showDialog"></div>
  </GmapMap>
</template>
<script>
export default {
  props: ["location", "helpText"],
  computed: {},
  watch: {
    location() {
      this.markers.position = {
        lat: this.location.lat,
        lng: this.location.lng
      };
    }
  },
  data() {
    return {
      showDialog: true,
      center: {
        lat: this.location.lat,
        lng: this.location.lng
      },
      markers: [
        {
          position: {
            lat: this.location.lat,
            lng: this.location.lng
          }
        }
      ]
    };
  },
  methods: {
    closeDialog() {
      this.showDialog = false;
    }
  },
  mounted() {}
};
</script>

<style lang="scss">
.gMap {
  width: 100%;
  height: 63rem;
  position: relative;

  &-desc {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 10%;
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 10px 25px 0;
    padding: 3.5rem 3rem;
    max-width: 45.7rem;
    z-index: 9;
    @media(max-width: 767px) {
      left: 0;
      margin: 0 30px;
    }
  }
  &-close {
    position: absolute;
    top: 2rem;
    right: 2rem;
    opacity: 0.5;
    cursor: pointer;
    font-size: 1.8rem;
  }
  .vue-map-hidden {
    display: block;
  }
}
.gmapOverlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #dbdbdb;
  opacity: 0.4;
}
</style>
