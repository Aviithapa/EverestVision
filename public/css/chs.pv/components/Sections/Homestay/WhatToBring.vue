<template>
  <div class="content content--green">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-5 offset-lg-1 offset-md-0">
          <div class="d-flex">
            <span class="include-icon box-inline-block box-inline-block--top chn-fireplace brand"></span>
            <div class="box-inline-block">
              <span class="p-l-30 title black title--small m-b-0 lh-auto">What's Included</span>
              <ul class="m-t-20 list-style-none custom-list">
                <li v-for="gear in includes">{{ gear }}</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-5 offset-lg-1 offset-md-0">
          <div class="d-flex">
            <span class="include-icon box-inline-block box-inline-block--top chn-tourist brand"></span>
            <div class="box-inline-block">
              <span class="p-l-30 title black title--small m-b-0 lh-auto">What To Bring</span>
              <ul class="m-t-20 list-style-none custom-list">
                <li v-for="gear in needToBring">{{ gear }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["includes", "needToBring"]
};
</script>
<style lang="scss" scoped>
.icon {
  width: 20%;
  height: 7.5rem;
}
.row {
  & > div {
    width: 80%;
  }
}
.include-icon {
  font-size: 7.5rem;
}
.list-style-none {
  list-style: none;
}
.custom-list {
  padding-left: 30px;
  li {
    color: #5e5e5e;
    font-size: 15px;
    letter-spacing: 0.7px;
    line-height: 30px;
    margin: 1rem 2.5rem 1rem 0;
    display: inline-block;
    &:before {
      content: "";
      width: 1rem;
      height: 1rem;
      background: orange;
      display: block;
      float: left;
      margin-top: 1rem;
      margin-right: 1rem;
      border-radius: 50%;
    }
  }
}
</style>
