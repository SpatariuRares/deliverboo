<template>
  <div class="container">
    <Cart />
    <Foods />
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