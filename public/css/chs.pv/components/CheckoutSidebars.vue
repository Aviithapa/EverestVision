<template>
  <b-card
    :img-src="firstProduct.banner_image"
    img-alt="Image"
    img-top
    tag="article"
    class="checkoutCard"
  >
    <div class="m-b-10 d-flex justify-content-between align-items-center">
      <h5 class="product-name m-b-0">{{ firstProduct.name }}</h5>
      <span class="chn-trash title--xxxs cursor-pointer"></span>
    </div>
    <p class="d-inline-block m-r-25 title--xxxs m-b-0">
      <i class="chn-location brand"></i>
      {{ firstProduct.location.name }}
    </p>
    <div class="d-flex justify-content-between align-items-center m-t-15 m-b-15">
      <counter v-model="firstProduct.selectedPax"></counter>
      <p
        class="title title--xxs black d-inline-block lh-auto m-b-0"
      >${{ getPriceForPax(firstProduct, firstProduct.selectedPax) }}</p>
    </div>
    <no-ssr>
      <Datepicker
        v-model="checkIn"
        placeholder="Check In Date"
        :disabledDates="{to: new Date()}"
        @selected="checkInSelected"
        format="yyyy-MM-dd"
        class="vdp-datepicker--homestay vdp-datepicker--sidebar"
      >
        <span slot="afterDateInput" class="chn-datepicker-icon chn-availability"></span>
        <span slot="afterDateInput" class="chn-arrow-icon chn-arrow-down sidebar-down"></span>
      </Datepicker>
      <Datepicker
        v-model="checkOut"
        placeholder="Check Out Date"
        :disabledDates="{to: checkIn}"
        @selected="checkOutSelected"
        format="yyyy-MM-dd"
        class="vdp-datepicker--homestay vdp-datepicker--sidebar"
      >
        <span slot="afterDateInput" class="chn-datepicker-icon chn-availability"></span>
        <span slot="afterDateInput" class="chn-arrow-icon chn-arrow-down sidebar-down"></span>
      </Datepicker>
    </no-ssr>
    <div class="hr hr--sidebar"></div>
    <div class="checkoutCard-additionals">
      <span class="d-block m-b-5 title title--xxs black text-left m-b-10 lh-auto">Additionals:</span>
      <div
        :key="product.id"
        v-for="(product, key) in products"
        v-if="key !== 0"
        class="additional-desc d-flex align-items-center justify-content-end m-b-5"
      >
        <p class="title--xxxs d-inline-block m-b-0 mr-auto mw-180 lh-auto">
          <b>{{ product.name }}</b>
        </p>
        <counter
          v-model="product.selectedPax"
          @input="paxSelected($event, product, key)"
          :key="`counter-${product.id}`"
        ></counter>
        <p
          :key="`price-${product.id}`"
          class="title title--xxs black d-inline-block lh-auto m-b-0 m-l-10 m-r-10"
        >${{ getPriceForPax(product, product.selectedPax) }}</p>
        <span class="chn-trash title--xxxs cursor-pointer m-b-5" @click="removeProduct(product)"></span>
      </div>
    </div>
    <div class="checkoutCard-total m-b-20">
      <div class="additional-desc d-flex align-items-center justify-content-between">
        <p
          class="title title--xxs black d-inline-block lh-auto m-b-0 text-left"
        >Total Booking Charge(US$):</p>
        <p class="title title--xxs black d-inline-block lh-auto m-b-0">${{ totalCost }}</p>
      </div>
    </div>
    <p
      class="title--xxxs lh-auto"
    >On arrival, please have your required government ID. This is for our host to authenticate the booking.</p>
  </b-card>
</template>

<script>
import PriceCalculator from "../services/PriceCalculator";
import NoSSR from "vue-no-ssr";
import Counter from "./UI/Counter";
import { differenceInDays } from "date-fns";

export default {
  name: "CheckoutSteps",
  components: {
    Counter,
    "no-ssr": NoSSR
  },
  mounted(){
    this.products = this.$store.getters.cartProducts ? this.$store.getters.cartProducts : [];
    this.$store.subscribeAction(({type, payload}, state) => {

      if(type === 'addProduct'){
        if(!this.products.map(p => p.id).includes(payload.id)){
          if(!payload.selectedPax){
            payload.selectedPax = 1
          }
          this.products.push(payload)
        }
      }

      if(type === 'productPaxSelected'){
        const [selectedProduct] = this.products.filter(p => p.id == payload.product.id)
        const index = this.products.indexOf(selectedProduct)
        this.$set(this.products, index, Object.assign(selectedProduct, {selectedPax:payload.pax}))
      }

    })

  },
  data() {
    return {
      showIcons: false,
      products : []
    };
  },
  computed: {
    duration() {
      if (this.checkIn && this.checkOut) {
        return differenceInDays(this.checkOut, this.checkIn);
      }
      return 0;
    },
    checkIn: {
      get() {
        return this.$store.getters.cartCheckInDate;
      },
      set(value) {
        this.$store.dispatch("setCheckIn", value);
      }
    },
    checkOut: {
      get() {
        return this.$store.getters.cartCheckOutDate;
      },
      set(value) {
        this.$store.dispatch("setCheckOut", value);
      }
    },
    firstProduct() {
      return this.$store.getters.cartProducts.length
        ? this.$store.getters.cartProducts[0]
        : { location: {} };
    },
    totalCost() {
      return this.$store.getters.totalBookingCost;
    }
  },
  methods: {
    paxSelected(pax, selectedProduct, key) {
      let product = Object.assign({},selectedProduct, { selectedPax : pax})
      this.$set(this.products, key, product)
      this.$emit("pax-selected", { pax, product });
    },
    getPriceForPax(product, pax) {
      let total = 0;
      let calculator = new PriceCalculator();
      if (product.prices) {
        const [USDPrice] = product.prices.filter(p => p.currency === "USD");
        if (product.category.slug === "homestay") {
          total +=
            calculator.getPriceForPax(USDPrice, pax) *
            differenceInDays(this.checkOut, this.checkIn);
        } else {
          total += calculator.getPriceForPax(USDPrice, pax);
        }
      }
      return total;
    },
    checkInSelected(checkIn) {
      let date = new Date(checkIn.getTime());
      date.setDate(date.getDate() + 1);
      this.$store.dispatch("setCheckIn", checkIn);
      this.$store.dispatch("setCheckOut", date);
    },
    checkOutSelected(checkOut) {
      this.$store.dispatch("setCheckOut", checkOut);
    },
    removeProduct(product) {
      this.$emit("product-removed", product);
      this.$store.dispatch("removeProduct", product);
    }
  }
};
</script>
<style lang="scss">
.btn-change {
  border: 1px solid #e5e5e5 !important;
  border-radius: 2px 0 0 2px !important;
  background-color: #e5e5e5 !important;
  padding: 0.8rem 0.5rem !important;
  color: #000 !important;
  font-size: 14px !important;
  min-width: 20px;
  line-height: 1 !important;
}

.btn-number {
  border: 1px solid #e5e5e5;
  background-color: #ffffff;
  padding: 0.3rem 0.7rem !important;
  color: #999;
  font-size: 14px !important;
  line-height: 1 !important;
}

.mr-auto {
  margin-right: auto;
}

.mw-180 {
  max-width: 160px;
}
.vdp-datepicker--sidebar {
  width: 100%;

  input {
    width: 100% !important;
    padding: 1.3rem 4rem 1.3rem 5rem;
  }
  .vdp-datepicker__calendar {
    width: 100% !important;
    margin-left: 0;
  }
}
</style>
<style lang="scss" scoped>
.sidebar-down {
  right: 2rem;
  font-size: 1rem;
}
.product-name {
  font-size: 1.8rem;
}
.chn-trash {
  color: red;
}
</style>
