<template>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <span class="title title--large black d-inline-block m-b-40">Share This Experience</span>
          <ul class="share-social p-l-0">
            <li>
              <a class="cursor-pointer" href="javascript:;" @click="shareOnFacebook">
                <span class="social-share chn-facebook"></span>
              </a>
            </li>
            <li>
              <a class="cursor-pointer">
                <span class="social-share chn-twitter"></span>
              </a>
            </li>
            <li>
              <a class="cursor-pointer">
                <span class="social-share chn-pinterest"></span>
              </a>
            </li>
            <li>
              <a class="cursor-pointer">
                <span class="social-share chn-linkedin"></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    shareOnFacebook() {
      FB.ui(
        {
          method: "share",
          display: "popup",
          href: window.location.toString()
        },
        function(response) {
          console.log(response);
        }
      );
    }
  }
};
</script>

<style lang="scss" scoped>
.chn-youtube {
  font-size: 25px;

  @media (max-width: 576px) {
    font-size: 15px;
  }
}
</style>
