<template>
  <div>
    <Carousel
      :slides="slidesMain"
      isMainSlider="true"
      :homestays="homestays"
      :activities.sync="activities"
      @homestay-selected="homestaySelected"
      style="height:100vh"
      key="1"
    />
    <WhyUs key="2"/>
    <HowYourTrip :slides="howYourTrip" key="3"/>
    <WhatIsYourIdealTrip :slides="whatIsYourIdealTrip" key="4"/>
    <Experiences :slides="experience" key="5"/>
    <Testimonial :slides="testimonial" key="6"/>
    <Community key="7" :images="insta"/>
    <AsSeenIn key="8"/>
  </div>
</template>

<script>
import Header from "~/components/Header";
import Carousel from "~/components/UI/Carousel";
import HowYourTrip from "~/components/Sections/Homepage/HowYourTrip";
import WhyUs from "~/components/Sections/Homepage/WhyUs";
import Community from "~/components/Sections/Homepage/Community";
import Testimonial from "~/components/Sections/Homepage/Testimonial";
import Experiences from "~/components/Sections/Homepage/Experiences";
import AsSeenIn from "~/components/Sections/Homepage/AsSeenIn";
import WhatIsYourIdealTrip from "~/components/Sections/Homepage/WhatIsYourIdealTrip";
import Homestay from "../services/models/Homestay";
import Activity from "../services/models/Activity";
import Cms from "../services/models/Cms";
import ConfirmSignupForm from "../services/forms/ConfirmSignupForm";

export default {
  transition: "page",
  methods: {
    async homestaySelected(homestay) {
      let model = new Activity();
      this.activities = (await model.findByHomestayId(homestay)).data;
    }
  },
  async asyncData() {
    let homestays = [];
    let activities = [];
    let instagramImages = [];
    try {
      let model = new Homestay();
      homestays = (await model.getAll()).data;
      instagramImages = (await Cms.findByKey("instagram-images")).data;
    } catch (error) {
      console.log(error);
    }
    return {
      activities,
      homestays,
      name: "Naren",
      slides: [
        {
          url: "https://explore.communityhomestay.com/images/barauli-jeep.jpeg",
          id: "1",
          desc: "Random Quote 1"
        },
        {
          url: "https://explore.communityhomestay.com/images/palpa-rani.jpeg",
          id: "2",
          desc: "Random Quote 2"
        },
        {
          url:
            "https://explore.communityhomestay.com/images/mustang-banner.jpg",
          id: "3",
          desc: "Random Quote 3"
        },
        {
          url: "https://explore.communityhomestay.com/images/patan-banner.jpg",
          id: "4",
          desc: "Random Quote 4"
        }
      ],
      slides2: [
        {
          url: "panauti.jpeg",
          id: "1",
          desc: "Random Quote 1"
        },
        {
          url: "tharu-host.jpeg",
          id: "2",
          desc: "Random Quote 2"
        },
        {
          url: "patan-newari.jpeg",
          id: "3",
          desc: "Random Quote 3"
        }
      ],
      slidesMain: [
        {
          url: "banner.jpeg",
          id: "1",
          desc: "Random Quote 1"
        }
      ],
      whatIsYourIdealTrip: [
        {
          url: "trip-001.jpg",
          id: "11212",
          desc: "Active"
        },
        {
          url: "trip-002.jpg",
          id: "2",
          desc: "People & Cultures"
        },
        {
          url: "trip-003.jpg",
          id: "3",
          desc: "Learning & Exploring"
        },
        {
          url: "trip-004.jpg",
          id: "4",
          desc: "Wildlife"
        }
      ],
      howYourTrip: [
        {
          url: "impact-001.jpg",
          id: "11212",
          desc: "Active"
        },
        {
          url: "impact-002.jpg",
          id: "2",
          desc: "People & Cultures"
        },
        {
          url: "impact-003.jpg",
          id: "3",
          desc: "Learning & Exploring"
        },
        {
          url: "impact-004.jpg",
          id: "4",
          desc: "Wildlife"
        },
        {
          url: "impact-001.jpg",
          id: "5",
          desc: "Wildlife"
        },
        {
          url: "impact-004.jpg",
          id: "6",
          desc: "Wildlife"
        },
        {
          url: "impact-004.jpg",
          id: "7",
          desc: "Wildlife"
        },
        {
          url: "impact-004.jpg",
          id: "8",
          desc: "Wildlife"
        }
      ],
      experience: [
        {
          url: "homestay-thumb.jpg",
          id: "Homestays",
          link: "/homestays",
          desc: "Live with a family in an authentic Nepali home."
        },
        {
          url: "experience-thumb.jpg",
          id: "Experiences",
          link: "/experiences",
          desc:
            "Book experiences led by your local hosts that showcases the best of the locality"
        },
        {
          url: "trail-thumb.jpg",
          id: "Trails (coming soon)",
          link: "/",
          desc: "Explore our curated multi-day itinerary"
        }
      ],
      testimonial: [
        {
          url:
            "https://instagram.fktm6-1.fna.fbcdn.net/vp/ae53737232fb67451342b0e36db1e85b/5CC9DB97/t51.2885-15/sh0.08/e35/s640x640/21225001_356844234745440_2890190012962308096_n.jpg?_nc_ht=instagram.fktm6-1.fna.fbcdn.net",
          id: "1121212",
          desc:
            "I arrived to the village and this group of amazing women greeted me, each putting a freshly woven necklace of flowers around my neck. They invited me into their home, fed me (way to my heart ❤️), and told me about the village and their lives",
          name: "Celinne Da Costa",
          date: "August 30, 2016"
        }
      ],
      insta: instagramImages
    };
  },
  data() {
    return {
      activities: [],
      homestays: []
    };
  },
  components: {
    Header,
    Carousel,
    WhyUs,
    HowYourTrip,
    Testimonial,
    WhatIsYourIdealTrip,
    AsSeenIn,
    Community,
    Experiences
  },
  layout: "index",
  head() {
    return {
      meta: [
        {
          hid: "fb:app_id",
          name: "fb:app_id",
          content: "2230052770552569"
        },
        {
          hid: "og:title",
          name: "og:title",
          content: "Community Homestay"
        },
        {
          hid: "og:site_name",
          name: "og:site_name",
          content: "Community Homestay"
        },
        {
          hid: "og:description",
          name: "og:description",
          content: "Community Homestay"
        },
        {
          hid: "og:type",
          name: "og:type",
          content: "website"
        },
        {
          hid: "og:image",
          name: "og:image",
          content:
            "https://s3.ap-south-1.amazonaws.com/chsfiles/media/hCYmh81PzE3RPUdO9bm1odXzBh2EhFhQgv6Ibm40.jpeg"
        }
      ]
    };
  },
  async mounted() {
      if (this.$route.query['password-token']) {
          this.$root.$emit("bv::show::modal", "resetPasswordModal");
      }
      if (this.$route.query['signup-confirm-token']) {
          let confirmSignupForm = new ConfirmSignupForm({
              'token' : this.$route.query['signup-confirm-token'],
              '$snack' : this.$snack
          });
          if (await confirmSignupForm.submit()) {
              this.$router.replace({});
              this.$root.$emit("bv::show::modal", "emailModal");
          }
      }
  }
};
</script>

<style>
</style>
