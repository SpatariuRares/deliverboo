<template>
  <div>
    <div v-if="showIndex">
      <Main/>
    </div>
    <div class="container-fluid" id="ciao" v-if="!showIndex">
      <div class="row">
        <Foods class=" col-12 col-lg-8" @updateCart="updateCart" :cart="cart"/>
        <Cart class=" col-12 col-lg-4" @deleteCartItem="deleteCartItem" :cart="cart" :reset ="reset"/>
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
        reset:false,
        cart:[],
        form: {
          id:-1,
        }
    };
  },
  mounted() {
		if (localStorage.getItem('cart')) {
			try {
				this.cart = JSON.parse(localStorage.getItem('cart'));
			} catch(e) {
				localStorage.removeItem('cart');
			}
		}
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
      let cartFlag=true;
      this.cart.forEach((food)=>{
        if(food.id==id){  
          cartFlag=false;
        }
      });
      if(cartFlag){
        axios.post("http://127.0.0.1:8000/api/food/cart",{ ...this.form }).then((response) => {
          if(response.data.cart.visible!=0){
            if(this.cart.length > 0) {
              if(response.data.cart["user_id"] == this.cart[0]["user_id"]){
                  this.cart.push(response.data.cart);
                  this.reset=false;
                }
                else{
                  // console.log("2",this.cart[0]["id"])
                  this.cart=[];
                  this.reset=true;
                  this.cart.push(response.data.cart);
                }
              }
              else{
                this.reset=true;
                this.cart.push(response.data.cart);
              }
            this.savecart();
          }
        })
      }
    },
    deleteCartItem(index){
      this.cart.slice(index,1)
      this.savecart();
    },
    savecart(){
			let cart = JSON.stringify(this.cart);
			localStorage.setItem('cart', cart);
		}
  }
};
</script>

<style lang="scss" scoped>
</style>