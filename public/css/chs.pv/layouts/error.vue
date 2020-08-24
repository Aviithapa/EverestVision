<template>
  <div class="error-wrap">
    <b-container>
      <b-row align-h="center">
        <b-col sm="12" md="12" lg="10">
          <b-row v-if="error.statusCode === 404">
            <b-col md="6" lg="5">
              <figure class="error-wrap__icon">
                <svg
                  version="1.1"
                  viewBox="0 0 371 223"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <defs>
                    <path
                      id="a"
                      d="m113 213.5c0 1.932-12.089 3.5-27 3.5s-27-1.568-27-3.5 12.089-3.5 27-3.5 27 1.568 27 3.5"
                    ></path>
                    <filter id="d" x="-13%" y="-71.4%" width="125.9%" height="300%">
                      <feOffset dx="0" dy="2" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                      <feGaussianBlur
                        in="shadowOffsetOuter1"
                        result="shadowBlurOuter1"
                        stdDeviation="2"
                      ></feGaussianBlur>
                      <feColorMatrix
                        in="shadowBlurOuter1"
                        values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.5 0"
                      ></feColorMatrix>
                    </filter>
                    <polygon
                      id="b"
                      points="0.11492 0.020172 87.387 0.020172 87.387 207.48 0.11492 207.48"
                    ></polygon>
                  </defs>
                  <g fill="none" fill-rule="evenodd">
                    <g transform="translate(-257 -244)">
                      <g transform="translate(0 127)">
                        <g transform="translate(257 104)">
                          <g transform="translate(0 13)">
                            <path
                              d="m55.821 183.33h-55.821v-22.78l52.208-79.548h29.627v79.548h16.439v22.78h-16.439v25.672h-26.014v-25.672zm-0.83444-67.098h-0.35319l-27.725 44.624h28.078v-44.624zm273.56 67.098h-55.821v-22.78l52.208-79.548h29.627v79.548h16.439v22.78h-16.439v25.672h-26.014v-25.672zm0.3355-67.098h-0.35319l-27.725 44.624h28.078v-44.624z"
                              fill="#5E5E5E"
                            ></path>
                            <g transform="translate(103)">
                              <use fill="black" filter="url(#d)" xlink:href="#a"></use>
                              <use fill="#6E6A67" fill-rule="evenodd" xlink:href="#a"></use>
                              <path
                                d="m173 86.681c0 38.743-25.364 71.538-60.357 82.641l-21.42 34.537c-2.5973 4.1877-6.8478 4.1877-9.4451 0l-21.42-34.537c-34.993-11.104-60.357-43.899-60.357-82.641 0-47.873 38.727-86.681 86.5-86.681 47.773 0 86.5 38.808 86.5 86.681zm-49.824 0.14788c0-20.33-16.424-36.815-36.677-36.815-20.256 0-36.675 16.486-36.675 36.815 0 20.33 16.419 36.815 36.675 36.815 20.253 0 36.677-16.486 36.677-36.815z"
                                fill="#ED9121"
                              ></path>
                              <g transform="translate(86)">
                                <mask id="c" fill="white">
                                  <use xlink:href="#b"></use>
                                </mask>
                                <path
                                  d="m0.11492 124.17c-20.062-0.31003-36.228-16.719-36.228-36.909 0-20.19 16.167-36.599 36.228-36.909v-50.336c48.2 0 87.272 38.893 87.272 86.872 0 38.83-25.591 71.698-60.898 82.826l-21.609 34.611c-1.3091 2.1007-3.038 3.1477-4.7647 3.1477v-83.301zc0.19246 0.002974 0.38528 0.004466 0.57845 0.004466 20.326 0 36.809-16.53 36.809-36.914 0-20.384-16.483-36.914-36.809-36.914-0.19317 0-0.38599 0.0014925-0.57845 0.0044668v73.819z"
                                  fill="#CE781B"
                                  mask="url(#c)"
                                ></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </figure>
            </b-col>
            <b-col md="6" lg="5" offset-lg="1" class="d-flex align-items-center">
              <div class="error-wrap__content">
                <h1 class="error-wrap__header">Ooops!</h1>
                <p>We can’t seem to find the page you’re looking for.</p>
                <p>
                  <b-button class="btn--brand btn--small text-uppercase" href="/">Go to home</b-button>
                </p>
              </div>
            </b-col>
          </b-row>
          <b-row v-else>
            <b-col md="6" lg="5" class="d-flex align-items-center">
              <figure class="error-wrap__icon">
                <svg version="1.1" viewBox="0 0 328 144" xmlns="http://www.w3.org/2000/svg">
                  <g fill="none" fill-rule="evenodd">
                    <g transform="translate(-278 -281)">
                      <g transform="translate(0 127)">
                        <g transform="translate(278 143)">
                          <g transform="translate(0 11)">
                            <path
                              d="m89.4 77.8c2 6.5334 3 12.867 3 19 0 6.8-1.0667 12.933-3.2 18.4-3.0667 8.5334-8.4666 15.3-16.2 20.3s-16.8 7.5-27.2 7.5c-10.133 0-19.033-2.4333-26.7-7.3s-13.1-11.5-16.3-19.9c-1.2-2.6667-2.1333-6-2.8-10v-0.8c0-1.8667 1.0667-2.8 3.2-2.8h22.2c1.8667 0 3.1333 0.93332 3.8 2.8 0.13333 0.4 0.46666 1.3333 1 2.8 1.2 3.4667 3.1667 6.1333 5.9 8s5.9666 2.8 9.7 2.8c3.4667 0 6.4667-0.83332 9-2.5s4.4667-3.9 5.8-6.7c1.0667-2.4 1.6-3.6667 1.6-3.8 0.93334-2.6667 1.4-5.4 1.4-8.2 0.26667-3.7334-0.33333-7.4-1.8-11-0.93334-3.4667-2.8-6.1333-5.6-8s-6.2666-2.8-10.4-2.8c-3.3334 0-6.3667 0.59999-9.1 1.8s-4.8333 3.0667-6.3 5.6c-0.93334 1.7333-2.2667 2.6-4 2.6h-23c-2.2667 0-3.4-1.1333-3.4-3.4v-77.2c0-2.2667 1.1333-3.4 3.4-3.4h80.6c2.2667 0 3.4 1.1333 3.4 3.4v17.4c0 2.2667-1.1333 3.4-3.4 3.4h-54.6c-0.26667 0-0.53333 0.13333-0.8 0.4s-0.4 0.53333-0.4 0.8l-0.2 29c0 0.53334 0.13333 0.86667 0.4 1s0.6 0.066668 1-0.2c6.1334-3.7334 13-5.6 20.6-5.6 9.3334 0 17.5 2.3666 24.5 7.1s11.967 11.233 14.9 19.5zm190.4 66c-14.667 0-26.267-4.1-34.8-12.3s-12.8-19.367-12.8-33.5v-52.8c0-13.867 4.2666-24.867 12.8-33s20.133-12.2 34.8-12.2 26.3 4.0666 34.9 12.2 12.9 19.133 12.9 33v52.8c0 14.133-4.3 25.3-12.9 33.5s-20.233 12.3-34.9 12.3zm0-24.2c6 0 10.767-1.8333 14.3-5.5s5.3-8.5666 5.3-14.7v-55c0-6.1334-1.7666-11.033-5.3-14.7s-8.3-5.5-14.3-5.5c-5.8667 0-10.567 1.8333-14.1 5.5s-5.3 8.5666-5.3 14.7v55c0 6.1334 1.7666 11.033 5.3 14.7s8.2333 5.5 14.1 5.5z"
                              fill="#5E5E5E"
                            ></path>
                            <path
                              d="m160.8 143.8c-14.667 0-26.267-4.1-34.8-12.3s-12.8-19.367-12.8-33.5v-52.8c0-13.867 4.2666-24.867 12.8-33s20.133-12.2 34.8-12.2 26.3 4.0666 34.9 12.2 12.9 19.133 12.9 33v52.8c0 14.133-4.3 25.3-12.9 33.5s-20.233 12.3-34.9 12.3zm0-24.2c6 0 10.767-1.8333 14.3-5.5s5.3-8.5666 5.3-14.7v-55c0-6.1334-1.7666-11.033-5.3-14.7s-8.3-5.5-14.3-5.5c-5.8667 0-10.567 1.8333-14.1 5.5s-5.3 8.5666-5.3 14.7v55c0 6.1334 1.7666 11.033 5.3 14.7s8.2333 5.5 14.1 5.5z"
                              fill="#ED9121"
                            ></path>
                            <path
                              d="m169 88.545v8.9091c0 1.392-1.1328 2.5455-2.5 2.5455h-10c-1.3672 0-2.5-1.1534-2.5-2.5455v-8.9091c0-1.392 1.1328-2.5455 2.5-2.5455h10c1.3672 0 2.5 1.1534 2.5 2.5455zm1.9989-42.974-1.135 30.857c-0.040536 1.4062-1.2566 2.5714-2.6754 2.5714h-10.377c-1.4188 0-2.6348-1.1652-2.6754-2.5714l-1.135-30.857c-0.040536-1.4062 1.0945-2.5714 2.5132-2.5714h12.971c1.4188 0 2.5538 1.1652 2.5132 2.5714z"
                              fill="#ED9121"
                            ></path>
                          </g>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </figure>
            </b-col>
            <b-col md="6" lg="5" offset-lg="1" class="d-flex align-items-center">
              <div class="error-wrap__content">
                <h1 class="error-wrap__header-2">Internal Server Error</h1>
                <p>We’re not quite sure what went wrong. You can go back, or try looking on our Help Center if you need a hand.</p>
                <p>
                  <b-button class="btn--brand btn--small text-uppercase" href="/">Go to home</b-button>
                </p>
              </div>
            </b-col>
          </b-row>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
export default {
  props: ["error"],
  layout: "blog" // you can set a custom layouts for the error page
};
</script>
