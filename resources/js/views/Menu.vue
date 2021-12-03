<template>
  <div class="container-fluid" id="ciao">
    <div class="row">
      <Foods class="col-8" @updateCart="updateCart" :cart="cart"/>
      <Cart class="col-4" @deleteCartItem="deleteCartItem" :cart="cart"/>
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
  methods: {
    updateCart(id){
      this.cart.push(id);
    },
    deleteCartItem(index){
      this.cart.slice(index,1)
    }
  }
};
</script>

<style lang="scss" scoped>
</style>