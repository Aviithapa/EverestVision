<template>
  <div class="checkout-steps">
    <nav class="navbar navbar-expand checkout-steps__navbar">
      <ul class="navbar-nav mr-auto checkout-steps__list">
        <li class="nav-item" :class="{'active':isActive1}">
          <nuxt-link to class="nav-link">Booking Info</nuxt-link>
        </li>
        <li class="nav-item" :class="{'active':isActive2}">
          <nuxt-link to class="nav-link">Review and Pay</nuxt-link>
        </li>
        <li class="nav-item" :class="{'active':isActive3}">
          <nuxt-link to class="nav-link">Confirmed!</nuxt-link>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  props: ["isActive3", "isActive2", "isActive1"]
};
</script>
