<template>
  <div class="content content--green" id="homestay-description-top" :class="{'content--white':isExperiencePage}">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8">
          <p>
            <p class="short-desc" :class="className" v-html="description"></p>
          <span
            class="collapse-link brand title title--xxs"
            @click="toggleShowMore"
          >{{ readMoreDisplayText }}</span>
          </p>

          <div v-if="!experiencePage">
            <span
              class="title title--small black lh-auto d-block text-left m-t-50"
            >Property Amenities</span>
            <div class="row m-t-30">
              <div v-for="(amenity, key) in amenities" :key="`amenity-${key}`" class="col-12 col-lg-4">
                <p class="m-b-30 d-flex">
                  <span class="amenities-icon black" :class="getIconName(amenity)"></span>
                  &nbsp; {{ amenity }}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div
          class="col-12 col-lg-4 offset-lg-0 offset-md-0 offset-sm-0 text-right"
          v-if="!experiencePage"
        >
          <FormBox
            v-if="!experiencePage"
            :isExperienceForm="experiencePage"
            :activities="activities"
            :homestay="homestay"
            class="margin-4-res"
          />
          <ExperienceBookForm v-if="experiencePage"/>
        </div>

        <div class="col-12 col-lg-4 offset-lg-0 offset-sm-0 text-right" v-if="experiencePage">
          <ExperienceBookForm v-if="experiencePage" :homestay="homestay"/>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import FormBox from "~/components/UI/FormBox";
  import ExperienceBookForm from "~/components/UI/ExperienceBookForm";

  export default {
    props: ["homestay", "activities", "isExperiencePage"],
    components: {
      FormBox,
      ExperienceBookForm
    },
    computed: {
      amenities() {
        let amenities = []

        this.homestay.hosts.forEach(host => {
          host.amenities.forEach(amenity => {
            if (amenities.indexOf(amenity.name) === -1) {
              amenities.push(amenity.name)
            }
          })
        })
        return amenities
      }
    },
    mounted(){
      this.description = this.homestay.description
    },
    methods: {
      getIconName(string) {
        if (!string) {
          return 'chn'
        }

        return 'chn-' + string.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '')

      },
      toggleShowMore() {

        this.className = this.className === 'short-desc--is-open' ? 'short-desc' : 'short-desc--is-open';
        this.readMoreDisplayText = this.readMoreDisplayText === 'Show More' ? 'Show Less' : 'Show More';
        if(this.className === 'short-desc'){
          if(document.getElementById('homestay-description-top')){
            document.getElementById('homestay-description-top').scrollIntoView({
              behavior: 'smooth'
            });
          }
        }
      }
    },
    data() {
      return {
        className: 'short-desc',
        description: '',
        excerpt: this.homestay.description_excerpt,
        readMoreDisplayText: "Show More",
        experiencePage: this.isExperiencePage
      };
    }
  };
</script>
<style lang="scss" scoped>
  .amenities-icon {
    font-size: 3rem;
  }

  .transition {
    transition: all 0.7s ease-in-out;
    span {
      transition: all 0.7s ease-in-out;
      cursor: pointer;
    }
  }

  .short-desc {
    max-height: 95px;
    overflow: hidden;
    transition: all .5s ease;
  }

  .short-desc--is-open {
    max-height: 999em;
  }

  .collapse-link {
    cursor: pointer;
  }
</style>
