<template>
  <div style="position:relative">
    <div class="content content--green content--small homestay-list-header">
      <section class="d-flex align-items-center">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-lg-12 flex-row">
              <no-ssr>
                <Datepicker
                  v-model="checkIn"
                  placeholder="Check In Date"
                  :disabledDates="{to: new Date()}"
                  @selected="checkInSelected"
                  format="yyyy-MM-dd"
                  ref="checkInHomestays"
                  class="vdp-datepicker--homestay vdp-datepicker--homestay-listing"
                >
                  <span slot="afterDateInput" class="chn-datepicker-icon chn-availability"></span>
                  <span slot="afterDateInput" class="chn-arrow-icon chn-arrow-down"></span>
                </Datepicker>

                <Datepicker
                  v-model="checkOut"
                  placeholder="Check Out Date"
                  :disabledDates="{to: checkIn}"
                  @selected="checkOutSelected"
                  format="yyyy-MM-dd"
                  ref="checkOutHomestays"
                  class="vdp-datepicker--homestay vdp-datepicker--homestay-listing"
                >
                  <span slot="afterDateInput" class="chn-datepicker-icon chn-availability"></span>
                  <span slot="afterDateInput" class="chn-arrow-icon chn-arrow-down"></span>
                </Datepicker>
                <v-select
                  v-model="selectedHomestay"
                  :options="homestays"
                  placeholder="Where to stay"
                  class="select-component v-select--brand v-select--homestay v-select--homestay-listing"
                  label="name"
                  ref="homestaySelectName"
                  @input="homestaySelected"
                ></v-select>
                <v-select
                  v-model="selectedPax"
                  :options="paxRange"
                  placeholder="Guests"
                  ref="homestaySelectPax"
                  class="select-component v-select--brand v-select--homestay v-select--homestay-listing v-select--small"
                  label="text"
                ></v-select>
                <button
                  class="btn btn--brand btn--medium text-uppercase btn--book"
                  type="submit"
                  @click="bookNow"
                  :disabled="!canInitiateBooking"
                >Book</button>
              </no-ssr>
              <div class="ml-auto d-none d-xl-block">
                <span
                  class="black title title--xxs m-l-7 m-r-15 m-b-0 link link--brand"
                  @click="showMap"
                >
                  <i class="chn-location"></i> Explore in a map
                </span>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="card-wrap">
      <div class="container-fluid container-fluid--custom">
        <div class="row homestays-row">
          <div v-for="(homestay, n) in homestays" :key="n" class="row-item">
            <HorizontalCard isHomestay="true" :key="`card-${n}`" :homestay="homestay"></HorizontalCard>
          </div>
        </div>
      </div>
    </div>
    <Map :class="{'showMap':status}" @closeMap="close"/>
  </div>
</template>

<script>
import HorizontalCard from "~/components/UI/HorizontalCard";
import Homestay from "../../services/models/Homestay";
import Map from "~/components/UI/Map";
import NoSSR from "vue-no-ssr";

export default {
  transition: "page",
  async asyncData() {
    let homestays = [];
    try {
      let model = new Homestay();
      homestays = (await model.getAll()).data;
    } catch (error) {
      console.log(error);
    }

    return {
      homestays,
      title: "List of Homestays"
    };
  },
  head() {
    return {
      title: this.title,
      meta: [
        {
          hid: "description",
          name: "description",
          content: "Best homestays in Nepal"
        }
      ]
    };
  },
  computed: {
    paxRange() {
      return [...Array(20)].map((_, i) => i + 1);
    },
    canInitiateBooking(){
      return this.checkIn && this.checkOut && this.selectedHomestay && this.selectedHomestay.id && this.selectedPax > 0
    }
  },
  data() {
    return {
      checkIn: null,
      checkOut: null,
      selectedHomestay: null,
      selectedPax: 1,
      status: false,
      date: new Date(2018, 12, 31)
    };
  },
  methods: {
    checkInSelected(checkIn) {
      let date = new Date(checkIn.getTime());
      date.setDate(date.getDate() + 1);
      this.checkOut = date;
      this.$refs["checkOutHomestays"].showCalendar();
    },
    checkOutSelected() {
      this.$refs.homestaySelectName.$refs.search.focus();
    },
    homestaySelected() {
      this.$refs.homestaySelectPax.$refs.search.focus();
    },
    bookNow() {
      this.$store.dispatch("clearCart");
      let homestay = Object.assign({}, this.selectedHomestay, {
        selectedPax: this.selectedPax
      });

      this.$store.dispatch("addProduct", homestay);
      this.$store.dispatch("setCheckIn", this.checkIn);
      this.$store.dispatch("setCheckOut", this.checkOut);
      this.$router.push({ name: "checkout" });
    },
    showMap() {
      this.status = true;
    },
    close() {
      this.status = false;
    }
  },
  components: {
    HorizontalCard,
    "no-ssr": NoSSR,
    Map
  },
  layout: "default"
};
</script>
<style lang="scss" scoped>
.homestays-row {
  transition: all 0.7s ease-in-out;
}

.row-item {
  width: 50%;
  border-bottom: 30px solid #fff;
}

.row-item {
  @media (max-width: 991px) {
    width: 100%;
  }
}

.row-item-full {
  width: 100%;
}

.row-half {
  width: 52%;
  height: 77vh;
  overflow-y: scroll;
}

.container-fluid--custom {
  position: relative;
}

#map-mini {
  position: absolute;
  right: 0;
  top: 0;
  height: 100%;
  width: 50%;
  background: #eee;
  background-position: center center !important;
  background-size: cover !important;
  background-repeat: no-repeat !important;

  @media (max-width: 992px) {
    display: none;
  }
}
.flex-row {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
}

@media (max-width: 1300px) {
  .ml-auto {
    margin: 0 !important;
  }
}
.vue-js-switch .v-switch-label.v-right {
  right: 18px !important;
}
.vue-js-switch .v-switch-label.v-left {
  left: 18px;
}
.btn--book {
  margin: 0.5rem;
}
@media (max-width: 767px) {
  .btn--book {
    width: 100%;
    margin: 0.5rem 0;
  }
}
.showMap {
  opacity: 1;
  visibility: visible;
  z-index: 99;
  position: fixed;
  width: 100vw;
  height: 100vh;
  top: 0;
  transition: all 0.7s ease-in-out;
}
</style>
