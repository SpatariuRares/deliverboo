<template>
  <div class="container" id="ciao">
    <div class="row">
      <Foods class="col-8" @updateCart="updateCart"/>
      <Cart class="col-4" :cart="cart"/>
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
  data(){
      return {
        cart:[],
    };
  },
  mounted() {
    console.log(this.studies); 
  },
  methods: {
    updateCart(id){
      this.cart.push(id);
    }
  }
};
</script>

<style lang="scss" scoped>
</style>