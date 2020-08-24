<template>
  <div>
    <CheckoutSteps isActive1="true"/>
    <no-ssr>
      <affix class="checkout-price-info d-lg-none" relative-element-selector="#checkout-customer">
        <sticky-total-cost></sticky-total-cost>
      </affix>
    </no-ssr>

    <div class="checkout-wrap" id="checkout-customer">
      <div class="container">
        <div class="row" v-if="!auth.id">
          <div class="col-md-12">
            <b-alert class="m-b-50 text-center" show variant="warning" dismissible>
              <figure class="alert__img-signin">
                <img src="~/static/invite.png" alt>
              </figure>
              <p class="content-inline">
                <strong>Are you already a member? Sign In for faster checkout.</strong>
              </p>
              <nuxt-link
                class="btn btn--medium btn--brand text-uppercase content-inline"
                to
                v-b-modal.emailModal
              >Sign In
              </nuxt-link>
            </b-alert>
          </div>
        </div>

        <div class="row default-size">
          <div class="col-lg-8" id="checkout-inner-customer">
            <span class="title title--small black">Customer Information</span>
            <p>Your personal information will be used to confirm this reservation upon arrival.</p>
            <div class="row m-b-50 m-t-20">
              <b-form-group class="form-checkout-group">
                <div class="col-lg-6 col-sm-12 m-b-30">
                  <b-form-input
                    class="exampleInput1 w-100 m-l-0 m-r-0"
                    type="text"
                    v-model="user.firstName"
                    :disabled="!!auth.id"
                    placeholder="First Name"
                    v-validate="'required'"
                    name="first name"
                  ></b-form-input>
                  <span
                    class="error-message"
                    v-if="errors.first('first name')"
                  >{{ errors.first('first name') }}</span>
                </div>

                <div class="col-lg-6 col-sm-12 m-b-30">
                  <b-form-input
                    class="exampleInput1 w-100 m-l-0 m-r-0"
                    type="text"
                    v-model="user.lastName"
                    :disabled="!!auth.id"
                    placeholder="Last Name"
                    v-validate="'required'"
                    name="last name"
                  ></b-form-input>
                  <span
                    class="error-message"
                    v-if="errors.first('last name')"
                  >{{ errors.first('last name') }}</span>
                </div>

                <div class="col-lg-6 col-sm-12">
                  <b-form-input
                    class="exampleInput1 w-100 m-l-0 m-r-0"
                    type="text"
                    v-model="user.email"
                    :disabled="!!auth.id"
                    placeholder="Email Address"
                    v-validate="'required|email'"
                    name="email"
                  ></b-form-input>
                  <span
                    class="error-message"
                    v-if="errors.first('email')"
                  >{{ errors.first('email') }}</span>
                </div>
              </b-form-group>
            </div>

            <span class="title title--small black"
                  v-if="!isHomestayCheckout && homestay && homestay.id">Add Homestay</span>
              <p>
                This activity is in {{ this.homestay.name }}. Select this if you like to spend the night here
              </p>

            <div class="row m-b-15 checkout__add-experience" v-if="!isHomestayCheckout && homestay && homestay.id">
              <b-form-group class="form-checkout-group">
                <div class="col-sm-12 col-md-6">
                  <no-ssr>
                    <p-check
                      class="p-icon p-curve"
                      v-model="homestay.selected"
                      @change="checkExperience($event, homestay)"
                    >
                      <i class="icon chn-check" slot="extra" v-if="homestay.selected"></i>
                      {{ homestay.name }}
                    </p-check>
                  </no-ssr>
                </div>
                <div class="col-sm-12 col-md-6 custom-flex">
                  <no-ssr>
                    <v-select
                      v-model="homestay.selectedPax"
                      placeholder="No. of Guests"
                      class="m-l-0"
                      :options="paxRange"
                      @input="paxSelected($event, homestay)"
                    ></v-select>
                  </no-ssr>
                  <span
                    class="brand title title--sm experience m-l-7 m-r-7 m-b-0"
                  >US ${{ getPriceForPax(homestay, 1)}}/Guest</span>
                </div>
              </b-form-group>
            </div>
            <span class="title title--small black m-t-50 m-b-10 d-block text-left">Add Experiences</span>
            <p class="m-b-30">All prices listed are in addition to base price.</p>

            <div class="row m-b-15 checkout__add-experience" v-for="experience in experiences">
              <b-form-group class="form-checkout-group">
                <div class="col-sm-12 col-md-6">
                  <no-ssr>
                    <p-check
                      class="p-icon p-curve"
                      v-model="experience.selected"
                      @change="checkExperience($event, experience)"
                    >
                      <i class="icon chn-check" slot="extra" v-if="experience.selected"></i>
                      {{ experience.name }}
                    </p-check>
                  </no-ssr>
                </div>
                <div class="col-sm-12 col-md-6 custom-flex">
                  <no-ssr>
                    <v-select
                      v-model="experience.selectedPax"
                      placeholder="No. of Guests"
                      class="m-l-0"
                      :options="paxRange"
                      @input="paxSelected($event, experience)"
                    ></v-select>
                  </no-ssr>
                  <span
                    class="brand title title--sm experience-price m-l-7 m-r-7 m-b-0"
                  >US ${{ getPriceForPax(experience, 1)}}/Guest</span>
                </div>
              </b-form-group>
            </div>

            <div class="row d-none d-lg-block">
              <div class="col-md-12 d-flex justify-content-end border-top">
                <button
                  @click="next"
                  class="btn btn--brand btn--large text-uppercase m-t-20"
                  type="submit"
                >Continue Booking
                </button>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <no-ssr>
              <affix
                class="checkout-sidebar-affix"
                relative-element-selector="#checkout-inner-customer"
              >
                <CheckoutSidebars
                  @product-removed="productRemoved"
                  @pax-selected="paxSelectedFormSidebar"
                />
              </affix>
            </no-ssr>
          </div>

        </div>

        <div class="row d-block d-lg-none">
          <div class="col-md-12 border-top mt-5">
            <button
              @click="next"
              class="btn btn--brand btn--large text-uppercase m-t-20"
              type="submit"
            >Continue Booking
            </button>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
  import CheckoutSteps from "~/components/CheckoutSteps";
  import CheckoutSidebars from "~/components/CheckoutSidebars";
  import StickyTotalCost from "~/components/Checkout/StickyTotalCost";
  import NoSSR from "vue-no-ssr";
  import PriceCalculator from "~/services/PriceCalculator";
  import Booking from "../../services/models/Booking";
  import {format} from "date-fns";

  export default {
    props: ["activities", "customer", "selectedHomestay"],
    watch: {
      customer() {
        this.user = this.customer;
      },
      activities: {
        handler() {
          this.experiences = this.activities;
          this.$store.getters.cartProducts.forEach(product => {
            this.experiences.forEach((experience, key) => {
              if (experience.id == product.id) {
                experience.selected = true;
                experience.selectedPax = product.selectedPax;
              }
            });
          });
        },
        deep: true
      },
      selectedHomestay(){
        this.homestay = this.selectedHomestay
      }
    },
    components: {
      CheckoutSteps,
      CheckoutSidebars,
      "no-ssr": NoSSR,
      StickyTotalCost
    },
    mounted() {
      this.$store.getters.cartProducts.forEach(product => {
        this.experiences.forEach((experience, key) => {
          if (experience.id == product.id) {
            experience.selectedPax = product.selectedPax;
            experience.selected = true;
          } else {
            experience.selectedPax = 0;
            experience.selected = false;
          }
        });
      });
    },
    computed: {
      isHomestayCheckout() {
        return this.$store.getters.isPrimaryHomestayCheckout;
      },
      paxRange() {
        return [...Array(20)].map((_, i) => i + 1);
      },
      auth() {
        return this.$store.getters.auth;
      }
    },
    methods: {
      paxSelected(pax, product) {
        this.$nextTick(() => {
          this.$store.dispatch("productPaxSelected", {pax, product});
        });
      },
      paxSelectedFormSidebar({pax, product}) {
        this.experiences.forEach((experience, key) => {

          if (this.homestay.id == product.id) {
            this.homestay = Object.assign({}, this.homestay, {
              selectedPax: pax
            });

          }

          if (experience.id == product.id) {
            let p = Object.assign({}, this.experiences[key], {
              selectedPax: pax
            });
            this.$set(this.experiences, key, p);
          }
        });
      },
      productRemoved(product) {
        this.experiences.forEach((experience, key) => {
          if (experience.id == product.id) {
            let p = Object.assign({}, this.experiences[key], {selected: false});
            this.$set(this.experiences, key, p);
          }
        });
      },
      getPriceForPax(product, pax) {
        let total = 0;
        let calculator = new PriceCalculator();
        if (product.prices) {
          const [USDPrice] = product.prices.filter(p => p.currency === "USD");
          total += calculator.getPriceForPax(USDPrice, pax);
        }
        return total;
      },
      checkExperience(checked, experience) {

        if (checked) {
          if (experience.category.slug === 'homestay') {
            let checkIn = this.$store.getters.cartCheckInDate
            let checkOut = new Date(checkIn.getTime())
            checkOut.setDate(checkOut.getDate() + 1)
            this.$store.dispatch('setCheckOut', checkOut)
          }
          this.$store.dispatch("addProduct", experience);
          return;
        }

        if (experience.category.slug === 'homestay') {
          let checkIn = this.$store.getters.cartCheckInDate
          this.$store.dispatch('setCheckOut', checkIn())
        }

        this.$store.dispatch("removeProduct", experience);
      },
      checkInSelected(checkIn) {
        let date = new Date(checkIn.getTime());
        date.setDate(date.getDate() + 1);
        this.checkOut = date;
      },
      async checkAvailability() {
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
          homestays
        };

        return Booking.checkAvailabiity(booking);
      },
      async next() {
        try {
          await this.checkAvailability();
          if (await this.$validator.validateAll()) {
            this.$emit("customer-selected", this.user);
            this.$emit("step-complete");
          } else {
            this.$snack.danger({
              text: "There are form errors",
              button: "close"
            });
          }
        } catch (error) {
          if (error.response.status === 416) {
            this.$snack.danger({
              text:
                "Sorry! We do not have the capacity for this number at this date. Please contact support for more information or change the number of guest and/or date",
              button: "close"
            });
          }
        }
      }
    },
    data() {
      return {
        homestay: this.selectedHomestay,
        country: "",
        status: false,
        selectedActivities: [],
        experiences: this.activities,
        selected: null,
        ind: "",
        checkOut: null,
        checkIn: null,
        user: this.customer
      };
    }
  };
</script>

<style lang="scss" scoped>
  .border-top {
    border-top: 1px solid #eee;
  }

  .custom-flex {
    display: flex;
    flex-direction: row;
    align-items: center;
  }

  @media (max-width: 992px) {
    .custom-flex {
      justify-content: space-between;
    }
  }

  .row .form-checkout-group {
    width: 100%;
  }

  .sm-down {
    right: 2rem;
    font-size: 8px;
  }
</style>
