<template>
  <div class="payment-loader">
    <div class="spinner">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.spinner {
  overflow: hidden;
  width: 100px;
}
.spinner div {
  width: 20px;
  height: 20px;
  position: absolute;
  left: -20px;
  top: 50%;
  transform: translateY(-50%);
  background-color: #f79b00;
  border-radius: 50%;
  animation: move 4s infinite cubic-bezier(0.2, 0.64, 0.81, 0.23);
}
.spinner div:nth-child(2) {
  animation-delay: 150ms;
}
.spinner div:nth-child(3) {
  animation-delay: 300ms;
}
.spinner div:nth-child(4) {
  animation-delay: 450ms;
}
@keyframes move {
  0% {
    left: 0%;
  }
  75% {
    left: 100%;
  }
  100% {
    left: 100%;
  }
}
</style>

<style lang="scss">
.payment-loader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  visibility: hidden;
  opacity: 0;
  z-index: -1;
  transition: all 0.5s ease;
}
.payment-loader-show {
  visibility: visible;
  opacity: 1;
  z-index: 99;
}
</style>


