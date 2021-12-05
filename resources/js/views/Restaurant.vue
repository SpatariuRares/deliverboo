<template>
  <div>
    <div v-if="showIndex">
      <Main/>
    </div>
    <div class="container-fluid" id="ciao" v-if="!showIndex">
      <div class="row">
        <Foods class="col-8" @updateCart="updateCart" :cart="cart"/>
        <Cart class="col-4" @deleteCartItem="deleteCartItem" :cart="cart"/>
      </div>
    </div>
  </div>
</template>

<script>
import Cart from "../components/Cart.vue";
import Foods from "../components/Foods.vue";
import Main from "../components/Main.vue";
export default {
  name: "Restaurant",
  components: {
    Main,
    Cart,
    Foods,
  },
  data(){
      return {
        showIndex: true,
        cart:[],
        form: {
          id:-1,
        }
    };
  },
  created() {
    if(window.location.pathname=="/"){
      this.showIndex=true;
    }
    else{
      this.showIndex=false;
    }
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