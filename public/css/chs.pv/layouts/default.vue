<template>
  <div>
    <Header isBlack="true"/>
    <nuxt/>
    <Subscribe/>
    <Footer/>
  </div>
</template>

<script>
import Header from "~/components/Header";
import Footer from "~/components/Footer";
import Subscribe from "~/components/Subscribe";
export default {
  head : {
    script: [
      {src: 'https://checkout.stripe.com/checkout.js'}
    ],
  },
  components: {
    Header,
    Footer,
    Subscribe
  }
};
</script>
