<template>
  <div>
    <CarouselHomestay :slides="slides" isHomestayTitle="true" :homestay="homestay"/>
    <Description isExperiencePage="true" :homestay="homestay" :activities="activities"/>
    <!--<Host :image="homestay.about_host_image" :text="homestay.about_host"/>-->
    <WhatToBring
      :includes="homestay.gears_provided"
      :need-to-bring="homestay.gears_required_to_bring"
    />
    <!--<HomestaySlider :activities="activities"/>-->
    <Community isActivityPage="true" :images="images" :name="homestay.name"/>
    <no-ssr>
      <GoogleMap
        :location="homestay.location"
        :help-text="homestay.help_get_there"
        v-if="homestay.location"
      />
    </no-ssr>
    <Cancellation :who-can-come="homestay.who_can_come"/>
    <Share/>
  </div>
</template>

<script>
import CarouselHomestay from "~/components/UI/CarouselHomestay";
import Description from "~/components/Sections/Homestay/Description";
import Community from "~/components/Sections/Homestay/HomestayCommunity";
import Host from "~/components/Sections/Homestay/Host";
import WhatToBring from "~/components/Sections/Homestay/WhatToBring";
import HomestaySlider from "~/components/Sections/Experience/HomestaySlider";
import Cancellation from "~/components/Sections/Homestay/Cancellation";
import GoogleMap from "~/components/Sections/Homestay/GoogleMap";
import Share from "~/components/Sections/Homestay/Share";
import Homestay from "~/services/models/Homestay";
import Activity from "~/services/models/Activity";
import NoSSR from "vue-no-ssr";

export default {
  components: {
    CarouselHomestay,
    Description,
    Host,
    WhatToBring,
    HomestaySlider,
    Community,
    Cancellation,
    Share,
    GoogleMap,
    "no-ssr": NoSSR
  },
  async asyncData(context) {
    let homestay = {};
    let activities = [];

    try {
      const activityModel = new Activity();
      homestay = (await activityModel.findBySlug(context.params.experience))
        .data;
      activities = [];
    } catch (e) {
      console.log(e);
    }

    return {
      homestay,
      activities,
      images:
        homestay.media && homestay.media.photos ? homestay.media.photos : [],
      slides: [
        {
          path: homestay.banner_image,
          id: "1",
          desc: "Mustang Bon",
          price: "$550 per pax"
        }
      ]
    };
  },
  head() {
    return {
      meta: [
        {
          hid: "og:url",
          name: "og:url",
          content: process.env.appUrl + "/experiences/" + this.homestay.slug
        },
        { hid: "og:type", name: "og:type", content: "place" },
        { hid: "og:title", name: "og:title", content: this.homestay.name },
        {
          hid: "og:description",
          name: "og:description",
          content: this.homestay.tagline
        },
        {
          hid: "og:image",
          name: "og:image",
          content: this.homestay.banner_image
        }
      ]
    };
  },
  layout: "index"
};
</script>
