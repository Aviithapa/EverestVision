<template>
  <b-modal
    id="emailModal"
    class="authModal authModal--big"
    ref="emailLoginModal"
    centered
    @shown="initialize"
  >
    <h1 class="title title--large black m-b-50">Welcome Back</h1>
    <!-- <p
      class="asSeenIn-desc m-b-50"
    >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pretium pretium tempor. Ut eget imperdiet neque.</p>-->
    <div class="row justify-content-center row-container">
      <div class="col-12 col-lg-5">
        <no-ssr>
          <b-form v-on:submit.prevent="" class="subscribe-form text-left">
            <b-form-group>
              <b-form-input
                class="form-input m-b-0"
                v-model="form.email"
                v-validate="'required|email'"
                name="email"
                placeholder="Email Address"
              ></b-form-input>
              <span class="error-message">{{ errors.first('email') }}</span>
              <b-form-input
                v-model="form.password"
                class="form-input m-t-20 m-b-0"
                type="password"
                v-validate="'required'"
                name="password"
                placeholder="Password"
              ></b-form-input>
              <span class="error-message">{{ errors.first('password') }}</span>
              <div class="remember d-flex justify-content-between align-items-center m-t-20 m-b-10">
                <no-ssr>
                  <p-check class="p-icon p-curve p-auth" v-model="form.remember_me">
                    <i class="icon chn-check" slot="extra"></i>
                    Remember me
                  </p-check>
                </no-ssr>
                <a class="cursor-pointer" v-b-modal.forgotPasswordModal>
                  <p class="brand m-b-0">Forgot Password?</p>
                </a>
              </div>
            </b-form-group>
            <LoaderButton
              type="submit"
              @click="onSubmit"
              btnName="Login"
              size="btn--medium"
              :fullwidth="true"
            />
          </b-form>
        </no-ssr>
      </div>
      <div class="col-12 col-lg-2 d-none d-lg-block d-xl-block">
        <div class="vertical-liner"></div>
      </div>
      <div class="col-12 col-lg-5">
        <div class="wrap d-flex justify-content-center align-items-center w-100 h-100">
          <button class="btn btn--large btn--blue text-uppercase" @click="loginWithFacebook">
            <span class="chn-facebook"></span>&nbsp; Login With Facebook
          </button>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <p class="black font-weight-bold m-t-50">
        Don't have an account yet?
        <a v-b-modal.signUpModal class="cursor-pointer">
          <span class="brand">Create your account</span>
        </a>
      </p>
    </div>
  </b-modal>
</template>

<script>
import Auth from "~/services/auth";
import LoginEmailForm from "~/services/forms/LoginEmailForm";
import LoaderButton from "~/components/UI/LoaderButton";

export default {
  components: {
    LoaderButton
  },

  data() {
    return {
      form: new LoginEmailForm({
        email: "",
        password: "",
        remember_me: "",
      })
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
          this.$refs.emailLoginModal.hide();
        },
        { scope: "email" }
      );
    },
    async onSubmit() {
      if (await this.form.validate()) {
        try {
          let token = (await this.form.submit()).data;
          this.form.reset();
          this.form.success("You've successfully logged in.");
          localStorage.setItem("access_token", token.access_token);
          let user = (await Auth.getDetails()).data;
          this.$store.dispatch("setUser", user);
          this.$intercom.boot({
            user_id: user.id,
            name: user.full_name,
            email: user.email
          });
          this.$refs.emailLoginModal.hide();
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
.btn--blue {
  @media (max-width: 992px) {
    margin-top: 3rem;
  }
}
</style>
<style lang="scss">
.p-auth .state label {
  padding-left: 30px;
  font-size: 14px;
}
</style>

<style lang="scss">
.snackbar {
  background: lighten(#f79b00, 30%) !important;
  border: 1px solid darken(#f79b00, 15%);
  z-index: 10000 !important;
  padding: 8px 55px 8px 15px !important;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
}
.snackbar .snackbar__text {
  font-family: "Nunito", Helvetica, Arial, sans-serif;
  font-size: 14px;
  color: #000000 !important;
}
.snackbar .snackbar__action {
  width: 20px;
  height: 20px;
  position: absolute;
  text-indent: -9999px;
  top: 7px;
  right: 10px;
  color: #000 !important;
  &:after {
    content: "\e910";
    position: absolute;
    width: 20px;
    height: 20px;
    top: 0;
    left: 0;
    font-family: "Community-Home-Network" !important;
    font-size: 14px;
    text-indent: 0;
  }
}
</style>
