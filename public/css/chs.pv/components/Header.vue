<template>
  <header>
    <b-navbar
      class="header"
      :class="{'header--dark' : black}"
      toggleable="sm"
      type="light"
      variant="faded"
    >
      <b-navbar-toggle target="nav_collapse" class="d-none"></b-navbar-toggle>

      <nuxt-link to="/">
        <b-navbar-brand>
          <img class="header-logo" src="~/assets/images/logo.png">
        </b-navbar-brand>
      </nuxt-link>

      <b-collapse
        is-nav
        id="nav_collapse"
        class="d-flex flex-column justify-content-end align-items-end"
      >
        <ul
          class="align-items-center social social--header list-unstyled margin-4-res d-none d-lg-flex p-b-15"
        >
          <li class="social__connect default-size">
            <b-link href="javascript:;" @click="$intercom.show()">
              <i class="chn-chat"></i>
              Connect With Us
            </b-link>
          </li>
          <li>
            <span class="social__separator">|</span>
          </li>
          <li>
            <b-link href="https://www.facebook.com/communityhomestay/" target="_blank">
              <i class="chn-facebook"></i>
            </b-link>
          </li>
          <li>
            <b-link href="https://twitter.com/CH_Homestay" target="_blank">
              <i class="chn-twitter"></i>
            </b-link>
          </li>
          <li>
            <b-link href="http://www.pinterest.com/CH_Homestay" target="_blank">
              <i class="chn-pinterest"></i>
            </b-link>
          </li>
          <li>
            <b-link href="https://www.linkedin.com/company/communityhomestay-com/" target="_blank">
              <i class="chn-linkedin"></i>
            </b-link>
          </li>
          <li>
            <b-link href="https://www.instagram.com/community_homestay/" target="_blank">
              <i class="chn-instagram"></i>
            </b-link>
          </li>
        </ul>
        <b-navbar-nav class="ml-auto header-right align-items-center">
          <li class="text-uppercase d-none d-lg-flex">
            <nuxt-link to="/homestays">homestays</nuxt-link>
          </li>
          <li class="text-uppercase d-none d-lg-flex">
            <nuxt-link to="/experiences">Experiences</nuxt-link>
          </li>
          <li class="text-uppercase m-l-10" v-if="auth.id">
            <!-- <a class="brand title title--xxs font-weight-bold cursor p-r-0">{{ auth.full_name }}</a> -->
            <div>
              <b-dropdown id="ddown1" :text="auth.full_name" class>
                <b-dropdown-item @click="$intercom.show()">
                  <span class="chn-help-circle"></span>&nbsp;Help
                </b-dropdown-item>
                <b-dropdown-item @click="$store.dispatch('logout')" class="no-border">
                  <span class="chn-logout"></span>&nbsp;Logout
                </b-dropdown-item>
              </b-dropdown>
            </div>
          </li>
          <li class="text-uppercase m-l-20 m-r-15 d-none d-sm-block" v-if="!auth.id">
            <a class="brand title title--xxs font-weight-bold cursor" v-b-modal.emailModal>Sign In</a>
          </li>

          <li v-if="!auth.id" class="d-none d-sm-block">
            <button
              class="btn btn--brand btn--small btn--experience text-uppercase"
              v-b-modal.signUpModal
            >sign up</button>
          </li>
          <li class="m-l-25 d-block d-lg-none">
            <span class="header-hamburger chn-hamburger white" @click="showOffcanvas"></span>
          </li>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
    <LoginModal @close="close"/>
    <LoginEmailModal/>
    <SignUpModal/>
    <ForgotPasswordModal/>
    <ResetPasswordModal/>
    <div class="overlay overlay--offcanvas" :class="{'overlay--bannerShow z-99':offcanvas}"></div>
    <Offcanvas
      :class="{'overlay--bannerShow z-99':offcanvas}"
      :show="offcanvas"
      @close="offcanvas = false"
    />
  </header>
</template>

<script>
import LoginModal from "~/components/UI/LoginModal";
import LoginEmailModal from "~/components/UI/LoginEmailModal";
import ForgotPasswordModal from "~/components/UI/ForgotPasswordModal";
import ResetPasswordModal from "~/components/UI/ResetPasswordModal";
import Offcanvas from "~/components/UI/Offcanvas";
import SignUpModal from "~/components/UI/SignUpModal";
import Auth from "~/services/auth";
export default {
  props: ["isBlack"],
  computed: {
    auth() {
      return this.$store.getters.auth;
    }
  },
  components: {
    LoginModal,
    SignUpModal,
    LoginEmailModal,
    ForgotPasswordModal,
    Offcanvas,
    ResetPasswordModal
  },
  async mounted() {
    try {
      if (
        localStorage.getItem("access_token") &&
        localStorage.getItem("access_token") !== "null"
      ) {
        let user = (await Auth.getDetails()).data;
        this.$store.dispatch("setUser", user);
        this.$intercom.boot({
          email: user.email,
          name: user.full_name,
          user_id: user.id
        });
        return;
      }
    } catch (e) {
      this.$store.dispatch("logout");
    }
    this.$intercom.boot({});
  },
  data() {
    return {
      black: this.isBlack,
      loginModalShow: false,
      isSignUp: false,
      signUpModalShow: false,
      emailModalShow: false,
      offcanvas: false
    };
  },
  methods: {
    close() {},
    showOffcanvas() {
      this.offcanvas = true;
    }
  }
};
</script>


<style lang="scss" scoped>
.nav-top {
  margin-bottom: 0;
}
.nav_top li {
  display: inline-block;
  color: #fff;
}
.chn-mail {
  font-size: 1.6rem;
}
.cursor {
  cursor: pointer;
}
.header-hamburger {
  /* color: #fff; */
  /* position: absolute; */
  /* top: 50%; */
  /* transform: translateY(-50%); */
  /* right: 3rem; */
  font-size: 1.8rem;
  cursor: pointer;
}
.z-99 {
  z-index: 99;
}
</style>

<style lang="scss">
#ddown1 #ddown1__BV_toggle_ {
  background: #f79b00;
  font-size: 16px;
  padding: 0.7rem 1.5rem;
  &:hover {
    background: #f79b00;
  }
  &:after {
    margin-left: 0.8em;
  }
}
#ddown1 .dropdown-menu {
  width: 100%;
  min-width: 150px;
  padding: 0;
  left: auto !important;
  right: 0;
  border-radius: 4px;
  box-shadow: 0 5px 20px rgba(0,0,0,.2);
  .dropdown-item {
    border-bottom: 1px solid lighten(#000, 90%) !important;
    padding: 1.5rem 2rem !important;
    &.no-border {
      border: none !important;
    }
    >span {
      margin-right: 5px;
      display: inline-block;
      vertical-align: middle;
      font-size: 1.7rem;
    }
  }
}
#ddown1 .dropdown-menu .dropdown-item {
  padding: 2rem;
  color: grey;
  font-size: 1.4rem;

  &:hover {
    background: #f1f1f1;
    color: #f79b00;
  }
}
</style>

