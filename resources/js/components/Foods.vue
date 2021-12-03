<template>
<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-sm-8 col-md-6 col-lg-4" v-for="food in foods" :key="food.id">
      <div class="card">
        <img class="card-img" :src="`/storage/${food.thumb}`" alt="">
          <h4 class="card-title">{{ food.name }}</h4>
            <p class="card-text">
                {{ food.ingredients}}
            </p>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success"><h5 class="mt-4">€{{ food.price}}</h5></div>
            <button @click="addToCart(food.id)" :disabled="cart.includes(food.id) ? '' : disabled" type="submit" class="btn btn-success mt-3"> Add to Cart</button>
          </div>  
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
    name: "Foods",
    data() {
        return {
          url: "http://127.0.0.1:8000/api",
          foods: [],
          users: window.location.pathname, 
        };
    },
    props:['cart'],
    created() {
      this.getFoods();
    },
    watch: { 
      	// carts: function() { // watch it
        //   console.log(this.carts,this.cart);
        //   this.cart=this.carts
        // }
    },
    methods: {
      getFoods(){
        axios.get(this.url + this.users + "/foods").
          then((response)=> {
            this.foods = response.data.foods;
          });
      },
      addToCart(id){
        this.$emit('updateCart', id)
      }
    }
};

</script>