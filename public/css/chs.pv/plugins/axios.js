import axios from "axios";

axios.interceptors.response.use(
  function (response) {

    return response;
  },
  function (error) {

    return Promise.reject(error);
  }
);

axios.interceptors.request.use(function (config) {

  if (process.browser) {
    if(window.localStorage.getItem('access_token')){
      config.headers.common['Authorization'] = 'Bearer ' + window.localStorage.getItem('access_token');
    }
  }

  return config;
}, function (error) {

  return Promise.reject(error);
});

