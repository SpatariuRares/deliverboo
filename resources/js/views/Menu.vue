<template>
  <div class="container" id="ciao">
    <div class="row">
      <Router-view/>
      <Foods class="col-8"/>
      <Cart class="col-4"/>
    </div>
  </div>
</template>

<script>
import Cart from "../components/Cart.vue";
import Foods from "../components/Foods.vue";
export default {
  name: "Menu",
  components: {
    Cart,
    Foods,
  },
};
</script>

<style lang="scss" scoped>
</style>