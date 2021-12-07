<template>
<div class="container-fluid">
  <div class="row row-cols-2">
    <div class="col p-2" v-for="food in foods" :key="food.id">
      <div class="border rounded d-flex p-2">
        <div class="w-50">
          <img :src="`/storage/${food.thumb}`" alt="">
        </div>
        <div class="w-50 pl-4 d-flex flex-column justify-content-between">
          <div>
            <h4 class="fw-bold">{{ food.name }}</h4>
            <p>{{ food.ingredients}}</p>
          </div>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price"><h5 class="mt-4">€{{ food.price}}</h5></div>
            <button @click="addToCart(food.id)" :disabled="id.includes(food.id) ? '' : disabled" type="submit" class="btn btn-success mt-3"> Add to Cart</button>
          </div>  
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
          id:[],
          users: window.location.pathname, 
        };
    },
    props:['cart'],
    created() {
      this.getFoods();
    },
    watch: { 
      	cart: function() { // watch it
          this.id=[]
          // console.log(this.carts,this.cart);
            this.cart.map((food)=> {
              this.id.push(food.id)
            })
        }
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

<style lang="scss" scoped>

div img{
  width: 100%;
  height: 100%;
}

</style>