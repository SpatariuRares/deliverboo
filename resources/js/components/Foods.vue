<template>
<div class="container-fluid">
<<<<<<< HEAD
  <div class="row row-cols-1 row-cols-lg-3 ">
    <div class="col p-2 ratio34"  v-for="food in foods" :key="food.id">
=======
  <div class="row row-cols-1 row-cols-lg-3">
    <div class="col p-3 ratio34"  v-for="food in foods" :key="food.id">
>>>>>>> 11099c06af1d9d07ffc19dd31ae1689490d987d0
      <div @click="addToCart(food.id)" class="border btn rounded d-flex " :class="id.includes(food.id) ? 'disabled' : null">
        <div class="w-50">
          <img :src="`/storage/${food.thumb}`" alt="">
        </div>
        <div class="w-50 d-flex flex-column justify-content-between pl-4">
          <span class="fw-bold food_name text-truncate">{{ food.name }}</span>
          <span>{{ food.ingredients}}</span>
          <span class="mt-4 food_price">€{{ food.price}}</span>  
          <span class="btn cart_btn">add to cart</span>
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
.ratio34{
  aspect-ratio: 2;
  &>*{
    width: 100%;
    height: 100%;
  }
}

.food_name {
  font-size: 1.5rem;
  font-weight: 600;
}

.food_price {
  font-weight: 600;
}

.cart_btn {
  background-color: #14D0C1;
  color: white;

  &:hover {
      border: 1px solid gray;
  }

  &:focus {
      outline: none;
      box-shadow: none;
  }
}
</style>