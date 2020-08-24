<template>
  <div
    id="mySidenav"
    :class="{'width-250':show}"
    class="sidenav d-flex align-items-flex-start justify-content-start flex-column"
  >
    <ul class="p-l-0">
      <li class v-if="auth.id">
        <span class="sidenav__user">{{ auth.full_name }}</span>
      </li>
      <li>
        <a class="closebtn" @click="closeOffcanvas">&times;</a>
      </li>
      <li>
        <nuxt-link to="/homestays">Homestays</nuxt-link>
      </li>
      <li>
        <nuxt-link to="/experiences">Experiences</nuxt-link>
      </li>
      <!-- <li>
        <nuxt-link to="/homestays">Trails</nuxt-link>
      </li>
      <li>
        <nuxt-link to="/homestays">Impacts</nuxt-link>
      </li>
      <li>
        <nuxt-link to="/homestays">Guidebook</nuxt-link>
      </li>-->
      <li>
        <a class="brand cursor" v-b-modal.loginModal>Sign In</a>
      </li>
      <li class="m-t-20 p-l-20 p-r-20">
        <a
          class="btn btn--brand btn--small btn--experience text-uppercase"
          v-b-modal.signUpModal
        >sign up</a>
      </li>
    </ul>
    <img class="offcanvas-logo" src="~/assets/images/logo.png">
  </div>
</template>
<script>
import Auth from "~/services/auth";

export default {
  props: ["show"],
  data() {
    return {};
  },
  computed: {
    auth() {
      return this.$store.getters.auth;
    }
  },
  methods: {
    closeOffcanvas() {
      this.$emit("close", false);
    }
  }
};
</script>

<style lang="scss" scoped>
.sidenav {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 100;
  opacity: 0;
  visibility: hidden;
  top: 0;
  right: 0;
  transform: translateX(250px);
  background-color: #1a1a1a;
  overflow-x: hidden;
  transition: 0.5s all ease-in-out;
  padding-top: 60px;
}
.width-250 {
  opacity: 1;
  visibility: visible;
  transform: translateX(0px);
}
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 2rem;
  color: #fff;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f79b00;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
  cursor: pointer;
}
.cursor {
  cursor: pointer;
}
.offcanvas-logo {
  width: 16rem;
  height: auto;
  margin: 40px auto;
}
</style>
