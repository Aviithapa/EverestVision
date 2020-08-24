import 'vue-snack/dist/vue-snack.min.css';

import Vue from 'vue'
import VueSnackbar from 'vue-snack'

Vue.use(VueSnackbar, {
  position: 'top-right', time: 5000,
  methods: [
    {
      name: 'success',
      color: 'green'
    },
    {
      name: 'danger',
      color: 'red'
    },
  ]
})
