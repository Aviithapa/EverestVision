<template>
  <div class="map">
    <div class="chsBanner-map">
      <img class="chsBanner-map-image" src="map-new.png">
      <i class="map-close" v-on:click="$emit('closeMap')"></i>

      <div class="chsBanner-map-marker" id="banner-marker1">
        <nuxt-link to="/homestays/ilam">
          <img class="location-icon" src="https://explore.communityhomestay.com/images/marker.svg">
        </nuxt-link>
        <div id="info-box1" class="info-box info-box--left">
          <div class="info-box-image" style="background:url('impact-001.jpg')"></div>
          <div class="info-box-desc">
            <p>
              <b>Ilam</b>
            </p>
            <p class="title--xxxs">
              Rolling hills and lush tea gardens – Ilam is famous for its enchanting scenery. Soak in the Himalayan views
              and enjoy the tranquility of nature
            </p>
          </div>
        </div>
      </div>
      <div class="chsBanner-map-marker" id="banner-marker2">
        <nuxt-link to="/homestays/barauli">
          <img class="location-icon" src="https://explore.communityhomestay.com/images/marker.svg">
        </nuxt-link>
        <div id="info-box2" class="info-box">
          <div class="info-box-image" style="background:url('barauli-jeep.jpeg')"></div>
          <div class="info-box-desc">
            <p>
              <b>Barauli</b>
            </p>
            <p class="title--xxxs">
              Just a stone’s throw away from Chitwan Nationa Park, Barauli is a traditional Tharu village. Explore the jungle,
              see endangered wildlife and experience the Tharu Culture
            </p>
          </div>
        </div>
      </div>
      <div class="chsBanner-map-marker" id="banner-marker5">
        <nuxt-link to="/homestays/panauti">
          <img class="location-icon" src="https://explore.communityhomestay.com/images/marker.svg">
        </nuxt-link>
        <div id="info-box5" class="info-box">
          <div class="info-box-image" style="background:url('panauti.jpeg')"></div>
          <div class="info-box-desc">
            <p>
              <b>Panauti</b>
            </p>
            <p class="title--xxxs">
              Panauti offers a nostalgic spirit of a Nepalese medieval town as the town continues its culture, tradition,
              and prestige as the way it was first built in the 13th century
            </p>
          </div>
        </div>
      </div>
      <div class="chsBanner-map-marker" id="banner-marker7">
        <nuxt-link to="/homestays/mustang-bon-community-homestay">
          <img class="location-icon" src="https://explore.communityhomestay.com/images/marker.svg">
        </nuxt-link>
        <div id="info-box7" class="info-box">
          <div class="info-box-image" style="background:url('mustang-hiking.jpg')"></div>
          <div class="info-box-desc">
            <p>
              <b>Mustang</b>
            </p>
            <p
              class="title--xxxs"
            >The Mustang region of Nepal was once an isolated and independent Tibetan kingdom. Now part of Nepal, it nevertheless retains a rugged and mystical reputation</p>
          </div>
        </div>
      </div>
      <div class="chsBanner-map-marker" id="banner-marker6">
        <nuxt-link to="/homestays/bardia">
          <img class="location-icon" src="https://explore.communityhomestay.com/images/marker.svg">
        </nuxt-link>
        <div id="info-box6" class="info-box">
          <div class="info-box-image" style="background:url('trip-004.jpg')"></div>
          <div class="info-box-desc">
            <p>
              <b>Bardia</b>
            </p>
            <p class="title--xxxs">
              Bardiya National Park offers some of the best wildlife watching on the continent. See endangered animals in
              their natural habitat and immerse yourself in the Tharu Culture
            </p>
          </div>
        </div>
      </div>
      <div class="chsBanner-map-marker" id="banner-marker10">
        <nuxt-link to="/homestays/piprahar">
          <img class="location-icon" src="https://explore.communityhomestay.com/images/marker.svg">
        </nuxt-link>
        <div id="info-box10" class="info-box">
          <div class="info-box-image" style="background:url('impact-004.jpg')"></div>
          <div class="info-box-desc">
            <p>
              <b>Piprahar</b>
            </p>
            <p class="title--xxxs">
              Located on the outskirts of Chitwan Nationa Park, Piprahar is a traditional Tharu village. Enjoy wild-class
              wildlife watching, explore peaceful villages and experience Tharu hospitality
            </p>
          </div>
        </div>
      </div>
      <div class="chsBanner-map-marker" id="banner-marker9">
        <nuxt-link to="/homestays/palpa">
          <img class="location-icon" src="https://explore.communityhomestay.com/images/marker.svg">
        </nuxt-link>
        <div id="info-box9" class="info-box">
          <div class="info-box-image" style="background:url('palpa-rani.jpeg')"></div>
          <div class="info-box-desc">
            <p>
              <b>Palpa</b>
            </p>
            <p class="title--xxxs">
              Once the capital of the Magar kingdom, Tansen is renowned for its rich cultural heritage. Walk the cobbled
              streets with your host family and admire the picturesque Newari houses
            </p>
          </div>
        </div>
      </div>
      <!-- <div class="chsBanner-map-marker" id="banner-marker8">
      <a>
        <img class="location-icon" src="https://explore.communityhomestay.com/images/marker.svg">
      </a>
      <div id="info-box8" class="info-box">
        <div class="info-box-image" style="background:url('map-new.png')"></div>
        <div class="info-box-desc">
          <p>
            <b>Nuwakot</b>
          </p>
          <p class="title--xxxs">
            Badly damaged in the earthquake, this traditional farming village is slowly getting back on its feet. Join
            this warm community and experience genuine hospitality
          </p>
        </div>
      </div>
      </div>-->
      <div class="chsBanner-map-marker" id="banner-marker11">
        <nuxt-link to="/homestays/patlekhet">
          <img class="location-icon" src="https://explore.communityhomestay.com/images/marker.svg">
        </nuxt-link>
        <div id="info-box11" class="info-box info-box--left">
          <div class="info-box-image" style="background:url('insta-009.jpg')"></div>
          <div class="info-box-desc">
            <p>
              <b>Patlekhet</b>
            </p>
            <p class="title--xxxs">
              Just 1 1/2 hours from the hustle and bustle of Kathmandu, Patlekhet makes for the perfect getaway. Experience
              a traditional organic farming village in rural Nepal
            </p>
          </div>
        </div>
      </div>
      <!-- <div class="chsBanner-map-marker" id="banner-marker3">
      <a>
        <img class="location-icon" src="https://explore.communityhomestay.com/images/marker.svg">
      </a>
      <div id="info-box3" class="info-box info-box--left">
        <div class="info-box-image" style="background:url('patan-banner.jpg')"></div>
        <div class="info-box-desc">
          <p>
            <b>Patan</b>
          </p>
          <p class="title--xxxs">
            Patan, also known as Lalitpur which means city of beauty, is a UNESCO World Heritage Site and is home to some
            of the finest temples and palaces in Nepal
          </p>
        </div>
      </div>
      </div>-->
      <div class="chsBanner-map-marker" id="banner-marker4">
        <nuxt-link to="/homestays/nagarkot">
          <img class="location-icon" src="https://explore.communityhomestay.com/images/marker.svg">
        </nuxt-link>
        <div id="info-box4" class="info-box info-box--left">
          <div class="info-box-image" style="background:url('nagarkot-sunrise.jpeg')"></div>
          <div class="info-box-desc">
            <p>
              <b>Nagarkot</b>
            </p>
            <p
              class="title--xxxs"
            >Just a stone’s throw from the hustle and bustle of Kathmandu, Nagarkot feel like another world. Unwind and soak in those famous Himalayan views</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  methods: {
    closeMap() {
      this.$emit("closeMap");
    }
  }
};
</script>

<style lang="scss" scoped>
.map-close {
  background: url("https://explore.communityhomestay.com/images/close.svg");
  background-repeat: no-repeat;
  position: fixed;
  top: 50px;
  right: 50px;
  height: 72px;
  width: 72px;
  -webkit-transition: 0.7s ease-in-out;
  transition: 0.7s ease-in-out;
  cursor: pointer;
  z-index: 3;

  &:hover {
    transform: scale(1.1);
  }
}

.location-icon {
  width: 2.8rem;
  cursor: pointer;
}

.title--xxxs {
  line-height: 1.8;
}
</style>

