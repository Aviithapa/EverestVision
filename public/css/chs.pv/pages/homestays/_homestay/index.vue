
<template>
  <div>
    <CarouselHomestay :slides="slides" isHomestayTitle="true" :homestay="homestay"/>
    <Description :homestay="homestay" :activities="activities"/>
    <Host :image="homestay.about_host_image" :text="homestay.about_host"/>
    <WhatToBring :includes="homestay.included" :need-to-bring="homestay.need_to_bring"/>
    <Experience :activities="activities"/>
    <Community
      :isHomestayPage="true"
      :name="homestay.name"
      :images="images"
      style="overflow-x:hidden"
      :isWhite="activities.length ? true:false"
    />
    <no-ssr>
      <GoogleMap :location="homestay.location" :help-text="homestay.help_get_there"/>
    </no-ssr>
    <Cancellation :who-can-come="homestay.who_can_come"/>
    <no-ssr>
      <Reviews :reviews="reviews" v-if="reviews.length"/>
    </no-ssr>
    <Share/>
  </div>
</template>

<script>
import Carousel from "~/components/UI/Carousel";
import CarouselHomestay from "~/components/UI/CarouselHomestay";
import Carousel2 from "~/components/UI/Carousel2";
import FormBox from "~/components/UI/FormBox";
import Description from "~/components/Sections/Homestay/Description";
import Community from "~/components/Sections/Homestay/HomestayCommunity.vue";
import Host from "~/components/Sections/Homestay/Host";
import WhatToBring from "~/components/Sections/Homestay/WhatToBring";
import Experience from "~/components/Sections/Homestay/Experience";
import Cancellation from "~/components/Sections/Homestay/Cancellation";
import GoogleMap from "~/components/Sections/Homestay/GoogleMap";
import Reviews from "~/components/Sections/Homestay/Reviews";
import Share from "~/components/Sections/Homestay/Share";
import HowYourTrip from "~/components/Sections/Homepage/HowYourTrip";
import Homestay from "~/services/models/Homestay";
import Activity from "~/services/models/Activity";
import ReviewModel from "~/services/models/Review";
import NoSSR from "vue-no-ssr";

export default {
  components: {
    Carousel,
    CarouselHomestay,
    FormBox,
    Description,
    Host,
    WhatToBring,
    Experience,
    Community,
    Reviews,
    Cancellation,
    HowYourTrip,
    Carousel2,
    Share,
    GoogleMap,
    "no-ssr": NoSSR
  },
  async asyncData(context) {
    let homestay = {};
    let activities = [];
    let reviews = [];
    try {
      const model = new Homestay();
      const activityModel = new Activity();
      reviews = new ReviewModel().findBySlug(context.params.homestay).reviews;
      homestay = (await model.findBySlug(context.params.homestay)).data;
      activities = (await activityModel.findByHomestayId(homestay.id)).data;
    } catch (e) {
      console.log(e);
    }

    return {
      homestay,
      activities,
      reviews,
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
          content: process.env.appUrl + "/homestays/" + this.homestay.slug
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
