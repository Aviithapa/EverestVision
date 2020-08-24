import Vue from 'vue';
import VueIntercom from 'vue-intercom';

Vue.use(VueIntercom, { appId: process.env.intercomAppId });
