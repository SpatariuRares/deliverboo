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
      form: {
        id:-1,
      }
    };
  },
  methods: {
    updateCart(id){
      this.form.id = id;
      axios.post("http://127.0.0.1:8000/api/food/cart",{ ...this.form }).then((response) => {
        if(this.cart.length > 0) {
          if(response.data.cart["user_id"] == this.cart[0]["user_id"]){
              this.cart.push(response.data.cart);
            }
            else{
              // console.log("2",this.cart[0]["id"])
              this.cart=[];
              this.cart.push(response.data.cart);
            }
          }
          else{
            this.cart.push(response.data.cart);
          }

			})
    },
    deleteCartItem(index){
      this.cart.slice(index,1)
    }
  }
};
</script>

<style lang="scss" scoped>
</style>