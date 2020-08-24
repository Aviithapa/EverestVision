<template>
  <div>
    <Header/>
    <transition name="fade">
      <nuxt/>
    </transition>
    <Subscribe/>
    <Footer/>
  </div>
</template>

<script>
import Header from "~/components/Header";
import Footer from "~/components/Footer";
import Subscribe from "~/components/Subscribe";
export default {
  components: {
    Header,
    Footer,
    Subscribe
  }
};
</script>
