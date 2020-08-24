<template>
  <div>
    <CheckoutSteps isActive2="true"/>

    <affix class="checkout-price-info d-lg-none" relative-element-selector="#checkout-payment">
      <sticky-total-cost></sticky-total-cost>
    </affix>

    <div class="checkout-wrap" id="checkout-payment">
      <div class="container">
        <div class="row">
          <div class="col-lg-8" id="checkout-inner-payment">
            <div class="row">
              <div class="col-lg-12">
                <span class="title title--small black d-block m-b-10 text-left">Secure Payment</span>
                <p
                  class="p-b-30 border-bottom m-b-50"
                >All card information is fully encrypted, secure and protected.</p>
              </div>
            </div>

            <div class="row m-b-50">
              <div class="col-lg-12">
                <p class="title title--small dark text-left lh-auto m-b-20">Payment Method</p>
                <div class="row m-b-30 pay-with">
                  <div class="col">
                    <h5>Pay With:</h5>
                    <ul class="list-unstyled list-inline pay-with__cards m-b-0">
                      <li class="list-inline-item">
                        <img src="~/assets/images/visa-dark@2x.png" alt="Visa">
                      </li>
                      <li class="list-inline-item">
                        <img src="~/assets/images/masterCard-dark@2x.png" alt="Visa">
                      </li>
                      <li class="list-inline-item">
                        <img src="~/assets/images/jcb-dark@2x.png" alt="Visa">
                      </li>
                      <li class="list-inline-item">
                        <img src="~/assets/images/discover-dark@2x.png" alt="Visa">
                      </li>
                      <li class="list-inline-item">
                        <img src="~/assets/images/americanExpress-dark@2x.png" alt="Visa">
                      </li>
                    </ul>
                  </div>
                </div>
                <button class="btn btn--outline m-l-0" @click="next">
                  <span class="chn-card"></span>&nbsp;&nbsp;Credit Card
                </button>
                <!--<form-->
                <!--:action="paypalAction"-->
                <!--method="post"-->
                <!--target="TheWindow"-->
                <!--id="TheForm"-->
                <!--class="d-inline-block"-->
                <!--&gt;-->
                  <!--<input type="hidden" name="booking_data" v-model="paypalData"/>-->
                <!--<button class="btn btn&#45;&#45;paypal" @click="paywithPaypal">-->
                <!--<img src="~/assets/images/paypal@2x.png" alt="paypal">-->
                <!--</button>-->
                <!--</form>-->
                <!--<button id="paypalSuccess" @click="paypalPaymentComplete" style="display: none"></button>-->
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="back-to">
                  <a href="javascript:;" @click="$emit('step-back')">
                    <i class="chn-arrow-thin-left"></i> Back to Booking Info
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <no-ssr>
              <affix
                class="checkout-sidebar-affix"
                relative-element-selector="#checkout-inner-payment"
              >
                <CheckoutSidebars/>
              </affix>
            </no-ssr>
          </div>
        </div>
      </div>
    </div>
    <Loader :class="{'payment-loader-show':isLoading}"/>
  </div>
</template>

<script>
import CheckoutSteps from "~/components/CheckoutSteps";
import CheckoutSidebars from "~/components/CheckoutSidebars";
import NoSSR from "vue-no-ssr";
import StickyTotalCost from "~/components/Checkout/StickyTotalCost";
import Booking from "~/services/models/Booking";
import { format } from "date-fns";
import Loader from "~/components/UI/Loader";

export default {
  components: {
    CheckoutSteps,
    CheckoutSidebars,
    "no-ssr": NoSSR,
    StickyTotalCost,
    Loader
  },
  props: ["customer"],
  watch: {
    customer() {
      this.user = this.customer;
    }
  },
  computed: {
    auth() {
      return this.$store.getters.auth;
    }
  },
  methods: {
    paypalPaymentComplete() {
      this.$store.dispatch("clearCart");
      this.$emit("step-complete");
    },
    async paywithPaypal() {
      let paypalPaymentWindow = window.open(
        "",
        "TheWindow",
        "menubar=no,height=800,width=600,resizable=yes,toolbar=no,status=no"
      );
      const booking = this.createBooking()
      let url = Booking.getPaypalPayurl(booking);
      this.paypalData = JSON.stringify(booking)
        console.log(this.paypalData)
      this.paypalAction = url;
      document.getElementById("TheForm").action = url;
      this.$nextTick(() => {
        document.getElementById("TheForm").submit();
        paypalPaymentWindow.focus();
      });
    },
    createBooking() {
      let activities = [];
      let homestays = [];
      let checkIn = this.$store.getters.cartCheckInDate;
      let checkOut = this.$store.getters.cartCheckOutDate;

      this.$store.getters.cartProducts.forEach(product => {
        let paxObject = {
          id: product.id,
          pax: product.selectedPax
        };

        if (product.category.slug === "homestay") {
          homestays.push(paxObject);
        }

        if (product.category.slug === "activity") {
          activities.push(paxObject);
        }
      });

      let booking = {
        check_in: format(checkIn, "YYYY-MM-DD"),
        check_out: format(checkOut, "YYYY-MM-DD"),
        currency_code: "USD",
        activities,
        homestays,
        first_name: this.user.firstName,
        last_name: this.user.lastName,
        email: this.user.email
      };

      if (this.auth.id) {
        booking.booked_for = this.auth.id;
      }

      return booking
    },
    async next() {
      this.isLoading = true;
      const handler = StripeCheckout.configure({
        key: process.env.stripePublishableKey,
        locale: "auto",
        token: async token => {
          this.isLoading = true;
          let model = new Booking();
          const booking = this.createBooking();
          await model.payWithStripe(booking, token.id);
          this.$store.dispatch("clearCart");
          this.$emit("step-complete");
          this.hasPaid = true;
        }
      });

      handler.open({
        name: "Community Homestay",
        description: "Payment for Booking",
        amount: this.$store.getters.totalBookingCost * 100,
        opened: () => {
          this.isLoading = false;
        },
        closed: () => {
          if (this.hasPaid) {
            this.isLoading = false;
          }
        }
      });
    },
    back() {
      this.$emit("step-back");
    }
  },
  data() {
    return {
        paypalData : {},
      paypalAction: Booking.paypalLoadingUrl(),
      name: "",
      user: this.customer,
      country: "",
      status: false,
      isLoading: false,
      selected2: null,
      hasPaid: false,
      cardName: "",
      cardNumber: "",
      expiryDate: "",
      cvc: "",
      options2: [
        { value: null, text: "Where to Stay" },
        { value: "a", text: "This is First option" },
        { value: "b", text: "Default Selected Option" },
        { value: "c", text: "This is another option" }
      ]
    };
  }
};
</script>

<style lang="scss" scoped>
.border-top {
  border-top: 1px solid #eee;
}

.border-bottom {
  border-bottom: 1px solid #eee;
}

.chn-add {
  border-radius: 50%;
  background: #f79b00;
  padding: 0.3rem;
  color: #fff;
  letter-spacing: 0.94px;
  line-height: 27px;
  height: 25px;
  font-size: 13px;
  font-weight: 500;
  width: 22px;
}

.btn--outline {
  color: #1a1a1a;
  font-family: "Avenir LT Std", Helvetica, Arial, sans-serif;
  font-size: 15px;
  font-weight: 900;
  letter-spacing: 0.75px;
  line-height: 20px;
  background: #fff;
  padding: 20.5px;
  border: 1px solid #ed9121;
  border-radius: 5px;
  margin: 0 10px;
}
</style>

