<template>
  <div>
    <transition name="fade" out-in>
      <CustomerInfo
        v-if="step==1"
        @step-complete="next"
        @step-back="back"
        :selected-homestay="homestay"
        :activities.sync="activities"
        @customer-selected="customerSelected"
        :customer="user"
      />
      <PaymentInfo
        v-if="step==2"
        @step-complete="next"
        @step-back="back"
        :homestay="homestay"
        :activities="activities"
        :customer="user"
      />
      <Confirm
        v-if="step==3"
        @step-complete="next"
        @step-back="back"
        :homestay="homestay"
        :activities="activities"
      />
    </transition>
  </div>
</template>
<script>
  import CustomerInfo from "~/components/Checkout/CustomerInfo";
  import PaymentInfo from "~/components/Checkout/PaymentInfo";
  import Confirm from "~/components/Checkout/Confirm";
  import Activity from "~/services/models/Activity";
  import Homestay from "../../services/models/Homestay";

  export default {
    components: {
      CustomerInfo,
      PaymentInfo,
      Confirm
    },
    asyncData(context) {
      if (context.query.success === '1') {
        return {
          step: 3
        }
      }

      return {
        step: 1
      }

    },
    async mounted() {

      if (this.$route.query.success) {
        if (opener && this.$route.query.success === '1') {
          opener.document.getElementById('paypalSuccess').click();
        }
        window.close()
        return;
      }

      const user = this.$store.getters.auth;
      this.user = {
        firstName: user.first_name,
        lastName: user.last_name,
        email: user.email,
      }

      this.$store.subscribeAction(({type, payload}, state) => {

        if(type === 'setUser'){
          this.user = {
            firstName: payload.first_name,
            lastName: payload.last_name,
            email: payload.email,
          }
        }
      })

      let [firstProduct] = this.$store.getters.cartProducts

      if (!firstProduct || !firstProduct.id) {
        this.$router.push({name: "index"})
        return
      }

      let activities = []
      let activityModel = new Activity
      let homestay = {}

      if (firstProduct.category.slug === 'homestay') {
        homestay = firstProduct
        activities = (await activityModel.findByHomestayId(firstProduct.id)).data;
      } else {
        let homestayModel = new Homestay()
        console.log(firstProduct.parent_id)
        homestay = (await homestayModel.findBySlug(firstProduct.parent_id)).data;
        activities = (await activityModel.findByHomestayId(firstProduct.parent_id)).data;
      }

      this.homestay = homestay
      this.activities = activities

    },
    head: {
      title: "Check Out"
    },
    methods: {
      customerSelected(customer) {
        this.user = customer
        this.$store.state.customerInfo = customer

      },
      next() {
        this.step++;
      },
      back() {
        this.step--;
      }
    },
    data() {
      return {
        homestay: {},
        activities: [],
        customerInfo: true,
        paymentInfo: false,
        confirm: false,
        user: {}
      };
    }
  };
</script>

