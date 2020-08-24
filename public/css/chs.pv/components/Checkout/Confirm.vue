<template>
  <div>
    <CheckoutSteps isActive3="true"/>
    <div class="container">
      <div class="row m-t-50 m-b-50">
        <div class="col-lg-12 text-center">
          <span class="chn-certificate chn-certificate-confirm"></span>
          <h1 class="title title--meduim dark d-block lh-auto m-t-30 m-b-20">Thank you</h1>
          <h2
            class="title title--xs dark d-inline-block lh-auto m-b-30"
          >For booking with Community Homestay</h2>
          <p class="asSeenIn-desc asSeenIn-desc--alt">
            We have received your payment. If you have any questions about your trip, please reach out to us via our website.
            We look forward to hosting you in Nepal.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CheckoutSteps from "~/components/CheckoutSteps";
export default {
  components: {
    CheckoutSteps
  }
};
</script>
<style lang="scss" scoped>
.asSeenIn-desc--alt {
  max-width: 66rem;
  margin-bottom: 0;
}
.chn-certificate-confirm {
  font-size: 13rem;
  color: #f79b00;
}
</style>
