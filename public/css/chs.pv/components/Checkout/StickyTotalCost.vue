<template>
  <div class="container">
    <div class="row">
      <div class="col-8">
        Total Booking Charge(US$):
      </div>
      <div class="col-4 text-right">
        ${{ totalBookingCost }}
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    computed : {
      totalBookingCost(){
        return this.$store.getters.totalBookingCost
      }
    }
  }
</script>
