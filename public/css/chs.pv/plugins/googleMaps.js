import Vue from 'vue'
import * as VueGoogleMaps from 'vue2-google-maps'

Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyDcrOfbwEx3Udfa1ytCgZBGFFjr_tAGHjY',
    libraries: 'places',
  },
})

document.addEventListener('DOMContentLoaded', function () {
  Vue.component('google-map', VueGoogleMaps.Map);
  Vue.component('google-marker', VueGoogleMaps.Marker);
});
