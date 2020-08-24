<template>
  <div class="formBox">
    <div class="formBox-row m-b-20 d-block text-left">
      <span class="d-inline-block align-middle title title--large lh-auto m-b-0 m-r-5">$ {{ usdPrice }}</span>
      <span class="d-inline-block align-middle dark base">per guest</span>
      <br>
    </div>
    <div class="formBox-form">
      <no-ssr>
        <Datepicker
          class="vdp-datepicker--homestay vdp-datepicker--formBox"
          v-model="checkIn"
          placeholder="Check In"
          :disabledDates="{to: new Date()}"
          @selected="checkInSelected"
          format="yyyy-MM-dd"
          :calendar-button="true"
          calendar-button-icon="chs-availability"
        >
          <span slot="afterDateInput" class="chn-datepicker-icon chn-availability"></span>
          <span slot="afterDateInput" class="chn-arrow-icon chn-arrow-down"></span>
        </Datepicker>
      </no-ssr>
      <no-ssr>
        <Datepicker
          class="vdp-datepicker--homestay vdp-datepicker--formBox"
          v-model="checkOut"
          placeholder="Check Out"
          :disabledDates="{to: checkIn}"
          format="yyyy-MM-dd"
        >
          <span slot="afterDateInput" class="chn-datepicker-icon chn-availability"></span>
          <span slot="afterDateInput" class="chn-arrow-icon chn-arrow-down"></span>
        </Datepicker>
        <v-select
          v-model="selectedPax"
          :options="paxRange"
          placeholder="Guests"
          class="select-component v-select--homestay-listing v-select--formBox"
          label="text"
        ></v-select>
      </no-ssr>
    </div>
    <div class="formBox-row">
      <button
        class="text-uppercase btn btn--brand btn--medium white w-100 m-t-10"
        @click="bookNow"
      >Book Now</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["activities", "homestay"],
  watch: {
    activities() {
      this.selectedActivities = this.activities;
    }
  },
  computed: {
    usdPrice() {
      return this.homestay.prices.filter(price => price.currency === "USD")[0]
        .group_prices[0].price;
    },
    paxRange() {
      return [...Array(20)].map((_, i) => i + 1);
    }
  },
  data() {
    return {
      selectedPax: 1,
      pax: null,
      selectedActivities: this.activities,
      options: [
        { value: null, text: "Select Pax", disabled: true },
        { value: 1, text: "1" },
        { value: 2, text: "2" }
      ],
      checkIn: null,
      checkOut: null
    };
  },
  methods: {
    checkInSelected(checkIn) {
      let date = new Date(checkIn.getTime());
      date.setDate(date.getDate() + 1);
      this.checkOut = date;
    },
    bookNow() {
      this.$store.dispatch("clearCart");
      let homestay = Object.assign({}, this.homestay, {
        selectedPax: this.selectedPax,
        category: {
          name: "Homestay",
          slug: "homestay"
        }
      });

      this.$store.dispatch("addProduct", homestay);
      this.$store.dispatch("setCheckIn", this.checkIn);
      this.$store.dispatch("setCheckOut", this.checkOut);
      this.$router.push({ name: "checkout" });
    }
  }
};
</script>

<style lang="scss" scoped>
.formBox {
  background: #fff;
  border-radius: 5px;
  box-shadow: 0 10px 25px 0 rgba(0, 0, 0, 0.05);
  padding: 2rem 3rem 3rem 3rem;
  display: inline-block;

  @media (max-width: 992px) {
    width: 100%;
  }
}
.formBox-row {
  display: flex;
  flex-direction: row;

  @media (max-width: 767px) {
    flex-direction: column;
  }
}
.chn-arrow-icon {
  right: 2rem;
  font-size: 8px;
  font-weight: bold;
}
</style>
