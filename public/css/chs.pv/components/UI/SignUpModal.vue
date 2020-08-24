<template>
  <b-modal
    ref="signUpModal"
    id="signUpModal"
    class="authModal authModal--big"
    centered
    @shown="initialize"
  >
    <h1 class="title title--large black">
      Join Our
      <span class="brand">Community</span>
    </h1>
    <p
      class="asSeenIn-desc m-b-50"
    >Sign Up to be part of our community and experience the authenticity of Nepal</p>
    <!--Sign Up With Email -->
    <div class="row justify-content-center row-container">
      <div class="col-12 col-lg-5">
        <b-form v-on:submit.prevent="" class="subscribe-form text-left">
          <b-form-group>
            <b-form-input
              class="form-input m-b-0"
              type="text"
              v-model="form.first_name"
              v-validate="'required'"
              data-vv-as="first name"
              placeholder="First Name"
              name="first_name"
            ></b-form-input>
            <span class="error-message">{{ errors.first('first_name') }}</span>
            <b-form-input
              class="form-input m-t-20 m-b-0"
              type="text"
              v-model="form.last_name"
              v-validate="'required'"
              data-vv-as="last name"
              name="last_name"
              placeholder="Last Name"
            ></b-form-input>
            <span class="error-message">{{ errors.first('last_name') }}</span>
            <b-form-input
              class="form-input m-t-20 m-b-0"
              type="email"
              v-model="form.email"
              placeholder="Email Address"
              v-validate="'required|email'"
              name="email"
            ></b-form-input>
            <span class="error-message">{{ errors.first('email') }}</span>
            <b-form-input
              class="form-input m-t-20 m-b-0"
              type="password"
              v-model="form.password"
              v-validate="'required|min:6'"
              placeholder="Password"
              name="password"
            ></b-form-input>
            <span class="error-message">{{ errors.first('password') }}</span>
          </b-form-group>
          <LoaderButton
                  :loading="form.submitting"
                  type="submit"
                  @click="onSubmit"
                  btnName="Submit"
                  size="btn--medium"
                  :fullwidth="true"
          />
        </b-form>
      </div>
      <div class="col-12 col-lg-2 d-none d-lg-block d-xl-block">
        <div class="vertical-liner"></div>
      </div>
      <div class="col-12 col-lg-5">
        <div class="wrap d-flex justify-content-center align-items-center w-100 h-100">
          <button
            class="btn btn--large btn--blue text-uppercase title--xxs"
            @click="loginWithFacebook"
          >
            <span class="chn-facebook"></span>&nbsp; Signup With Facebook
          </button>
        </div>
      </div>
      <div class="col-12 col-lg-5">
        <div class="wrap d-flex flex-column justify-content-center align-items-center w-100 h-100">
          <span class="title title--small black d-inline-block m-b-0 p-t-30">Already Registered ?</span>
          <a class="cursor-pointer" v-b-modal.emailModal>
            <p class="brand">Login</p>
          </a>
        </div>
      </div>
    </div>
  </b-modal>
</template>

<script>
import Auth from "~/services/auth";
import SignupWithEmailForm from "~/services/forms/SignupWithEmailForm";
import LoaderButton from "~/components/UI/LoaderButton";

export default {
  components: {
      LoaderButton
  },
  data() {
    return {
      form: new SignupWithEmailForm({
          email: "",
          first_name: "",
          last_name: "",
          password: "",
      }),
    };
  },
  methods: {
    initialize() {
        this.form.$validator = this.$validator;
        this.form.$snack = this.$snack;
        this.form.reset();
    },
    async loginWithFacebook() {
      FB.login(
        async response => {
          let registerResponse = (await Auth.loginWithFacebook(
            response.authResponse.accessToken
          )).data;
          localStorage.setItem("access_token", registerResponse.access_token);
          let user = (await Auth.getDetails()).data;
          this.$store.dispatch("setUser", user);
          this.$intercom.boot({
            user_id: user.id,
            name: user.full_name,
            email: user.email
          });
          this.$refs.signUpModal.hide();
        },
        { scope: "email" }
      );
    },
    async onSubmit() {
      if (await this.form.validate()) {
        try {
          let response = await this.form.submit();
          this.form.reset();
          this.$refs.signUpModal.hide();
          this.form.success(response.message);
        } catch (error) {
          this.form.handleError(error);
        }
        this.form.afterSubmit();
      }
    }
  }
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
