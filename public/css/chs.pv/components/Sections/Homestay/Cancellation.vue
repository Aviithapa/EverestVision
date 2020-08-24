<template>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 offset-md-0">
          <div class="flex-content">
            <span class="cancellation-icon d-block chn-cancel brand m-b-30"></span>
            <span class="title black title--small">Cancellation Policy</span>
            <p
              class="text-center"
            >Full refund will be issued if cancellation is within 48 hours of arrival. 50% will be charged if canceled within 48hours and 100% will be charged for no show.</p>
          </div>
        </div>
        <div class="col-12 col-md-6 offset-md-0 margin-4-res">
          <div class="flex-content">
            <span class="cancellation-icon d-block chn-people brand m-b-30"></span>
            <span class="title black title--small">Is this for you?</span>
            <span class="text-center p" v-html="whoCanCome"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["whoCanCome"]
};
</script>

<style scoped>
.logo {
  width: 75px;
}
.flex-content {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  max-width: 45rem;
  margin: 0 auto;
  padding: 0 15px;
}
.cancellation-icon {
  font-size: 7.5rem;
}
</style>
