<template>
  <b-modal
    id="resetPasswordModal"
    class="authModal authModal--small"
    ref="resetPasswordModal"
    centered
    @shown="initialize"
  >
    <h1 class="title title--large brand">Reset Password</h1>
    <p
      class="asSeenIn-desc m-b-50"
    >Please change your password and click 'Submit'.</p>

    <div class="row justify-content-center row-container">
      <div class="col-md-12">
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
                  class="form-input m-b-0 m-t-30"
                  v-model="form.password"
                  v-validate="'required'"
                  name="password"
                  type="password"
                  placeholder="Password"
          ></b-form-input>
          <span class="error-message">{{ errors.first('password') }}</span>
          <b-form-input
                  class="form-input m-b-0 m-t-30"
                  v-model="form.password_confirmation"
                  v-validate="'required'"
                  data-vv-as="password confirmation"
                  name="password_confirmation"
                  type="password"
                  placeholder="Confirm Password"
          ></b-form-input>
          <span class="error-message">{{ errors.first('password_confirmation') }}</span>
        </b-form-group>

        <LoaderButton
                :loading="form.submitting"
                type="submit"
                @click="resetPassword"
                btnName="Submit"
                size="btn--medium"
                :fullwidth="true"
        />
      </div>
    </div>
  </b-modal>
</template>

<script>
import Auth from "~/services/auth";
import ResetPasswordForm from "~/services/forms/ResetPasswordForm";
import LoaderButton from "~/components/UI/LoaderButton";

export default {
  components: {
    LoaderButton
  },

  data() {
    return {
      form: new ResetPasswordForm({
        email: "",
        password: "",
        password_confirmation: "",
      })
    };
  },
  methods: {
      initialize() {
          this.form.$validator = this.$validator;
          this.form.$snack = this.$snack;
          this.form.reset();
          this.form.resetToken = this.$route.query['password-token'];
      },
     async resetPassword() {
      if (await this.form.validate()) {
          try {
              let response = await this.form.submit();
              this.form.success(response.message);
              this.form.reset();
              this.$refs.resetPasswordModal.hide();
              this.$router.replace({});
              this.$root.$emit("bv::show::modal", "emailModal");
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
.mw930 {
  max-width: 930px;
}
</style>

