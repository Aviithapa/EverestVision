<template>
  <b-modal id="loginModal" centered class="authModal" v-model="visible">
    <h1 class="title title--large black">
      Join Our
      <span class="brand">Community</span>
    </h1>
    <p
      class="asSeenIn-desc m-b-50"
    >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pretium pretium tempor. Ut eget imperdiet neque.</p>

    <button class="btn btn--large btn--blue text-uppercase">
      <span class="chn-facebook"></span>&nbsp; Login With Facebook
    </button>
    <div class="horizontal-liner"></div>
    <button class="btn btn--large btn--brand text-uppercase m-b-50" v-b-modal.emailModal>
      <span class="chn-mail"></span>&nbsp; Login With Email
    </button>
    <p class="black font-weight-bold">
      Don't have an account yet?
      <a class="cursor-pointer" v-b-modal.signUpModal>
        <span class="brand">Create your account</span>
      </a>
    </p>
  </b-modal>
</template>

<script>
export default {
  props: ["show", "isSignUp"],

  data() {
    return {
      visible: this.show,
      signUp: this.isSignUp,
      email: "",
      name: "",
      pass: "",
      status: "",
      confirm: ""
    };
  },
  watch: {
    show() {
      this.visible = this.show;
    },
    signUp() {
      this.signUp = this.isSignUp;
    }
  },
  methods: {}
};
</script>

<style lang="scss" scoped>
.row-container {
  min-height: 300px;
}
.mw930 {
  max-width: 930px;
}
</style>
