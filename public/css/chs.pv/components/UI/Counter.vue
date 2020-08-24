<template>
  <b-button-group size="sm">
    <b-button class="btn-change" @click="subtract">-</b-button>
    <b-button class="btn-number" style="cursor: default">{{ count }}</b-button>
    <b-button class="btn-change" @click="add">+</b-button>
  </b-button-group>
</template>
<script>
  export default {
    name: 'Counter',
    props: {
      value: {
        default: 0
      },
      min: {
        default: 0
      }
    },
    watch : {
      value(){
        this.count = this.value
      }
    },
    methods: {
      subtract() {
        if (this.count <= this.min) {
          return;
        }
        this.count--
        this.$emit('input', this.count)

      },
      add() {
        this.count++
        this.$emit('input', this.count)
      }
    },
    data() {
      return {
        count: this.value,
      }
    }

  }
</script>
