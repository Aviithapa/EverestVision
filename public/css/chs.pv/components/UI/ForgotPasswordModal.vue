<template>
  <b-modal
    id="forgotPasswordModal"
    class="authModal authModal--small"
    ref="forgotPasswordModal"
    centered
    @shown="initialize"
  >
    <h1 class="title title--large brand">Forgot Password</h1>
    <p
      class="asSeenIn-desc m-b-50"
    >Please enter your email address. We will send a password reset link to your email.</p>
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
          <span class="error-message" v-if="errors.first('email')">{{ errors.first('email') }}</span>
        </b-form-group>
        <LoaderButton
                :loading="form.submitting"
                type="submit"
                @click="forgotPassword"
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
import ForgotPasswordForm from "~/services/forms/ForgotPasswordForm";
import LoaderButton from "~/components/UI/LoaderButton";
export default {
  components: {
    LoaderButton
  },

  data() {
    return {
      form: new ForgotPasswordForm({
          email: "",
      }),
    };
  },
  methods: {
    initialize() {
        this.form.$validator = this.$validator;
        this.form.$snack = this.$snack;
        this.form.reset();
    },
    async forgotPassword() {
      if (await this.form.validate()) {
          try {
              let response = await this.form.submit();
              this.form.success(response.message);
              this.$refs.forgotPasswordModal.hide();
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

