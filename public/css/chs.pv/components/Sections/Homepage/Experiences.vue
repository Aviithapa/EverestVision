<template>
  <section class="experiences">
    <div class="container-fluid">
      <div class="row">
        <CardExperience
          v-for="slide in slides"
          :key="slide.id"
          :link="slide.link"
          :information="slide"
          :isLarge="true"
        />
      </div>
    </div>
  </section>
</template>

<script>
import CardExperience from "~/components/UI/CardExperience";
export default {
  props: ["slides"],
  components: {
    CardExperience
  }
};
</script>
