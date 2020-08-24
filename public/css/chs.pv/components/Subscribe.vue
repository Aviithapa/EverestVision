<template>
  <div class="subscribe">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-10 col-md-push-1 subscribe-flex">
          <h4 class="title title--small white m-b-0">Subscribe With Us</h4>

          <b-form-group>
            <b-form-input
              id="exampleInput1"
              type="text"
              v-model="email"
              name="email"
              v-validate="'required|email'"
              required
              placeholder="Enter email"
            ></b-form-input>
            <span class="error-message" v-if="errors.first('email')">{{ errors.first('email') }}</span>
          </b-form-group>
          <b-button
            type="button"
            @click="onSubmit"
            class="btn btn--blk btn--small btn--heavy text-uppercase"
          >
            <span v-if="this.loading" class="loader"></span>
            <span>Subscribe</span>
          </b-button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Cms from "~/services/models/Cms";
export default {
  data() {
    return {
      email: "",
      loading: false
    };
  },
  methods: {
    async onSubmit() {
      if (await this.$validator.validateAll()) {
        this.loading = true;
        try {
          await Cms.subscribe(this.email);
          this.loading = false;
          this.$snack.success({
            text: "Thank you for subscribing",
            button: "close"
            // action: this.clickAction
          });
        } catch (error) {
          this.loading = false;
        }
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.subscribe {
  /* background-image: url('~static/paperplane.png');
  background-repeat: no-repeat;
  background-size: 200px;
  background-position: -40px 50px; */
  position: relative;
  overflow: hidden;
  &:before {
    content: "";
    width: 235px;
    height: 155px;
    background-image: url("~static/paperplane.png");
    background-repeat: no-repeat;
    background-size: 235px;
    position: absolute;
    bottom: -30px;
    left: -45px;
    opacity: 0.3;
  }
}
.title {
  display: inline-block;
}
form {
  display: inline-block;
}
form-group {
  display: inline-block;
}
.subscribe-form fieldset {
  display: inline-block;
  margin: 0;
}
#exampleInput1 {
  height: 5rem;
  width: 32rem;
  border-radius: 5px;
  font-size: 15px;
  color: #808080;
  letter-spacing: 1px;
  font-weight: 00;
  padding: 1.5rem 2rem;
  margin: 0 1.5rem 0 3rem;
}
// .btn {
//   margin-top: -8px;
// }
.subscribe-flex {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
  .form-group {
    margin-bottom: 0px !important;
    position: relative;
  }
}
.error-message {
  position: absolute;
  left: 9%;
  font-size: 1.2rem;
}
@media (max-width: 1199px) {
  .subscribe-flex {
    display: flex;
    flex-direction: column;
  }
  .btn {
    margin-top: 3rem;
  }
}
@media (max-width: 992px) {
}
@media (max-width: 767px) {
  /* .btn {
    margin-top: 2rem;
  } */
  .subscribe-form {
    text-align: center;
  }
  #exampleInput1 {
    margin: 2rem 0;
    margin-bottom: 0;
  }
  form {
    display: flex;
    flex-direction: column;
  }
  .error-message {
    position: absolute;
    left: 1%;
    font-size: 1.2rem;
  }
}
</style>
