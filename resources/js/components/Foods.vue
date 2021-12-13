<template>
<div class="container-fluid">
  <div class="row word-wrap">
    <div v-for="food in foods" :key="food.id" :class="(food.name!=null) ? 'd-flex col-6 col-lg-4 p-2' : null">
      <div  :class="(food.name!=null) ? 'col p-2 d-flex ' : null"  v-if="food.name!=null">
        <div @click="addToCart(food.id)" class="border flex-fill btn rounded d-flex " :class="(id.includes(food.id) || food.visible==0) ? 'disabled' : null">
          <div class="w-50">
            <img :src="`/storage/${food.thumb}`" alt="">
          </div>
          <div class="w-50 d-flex flex-column justify-content-between pl-4">
            <span class="fw-bold food_name">{{ food.name }}</span>
            <span>{{ food.ingredients}}</span>
            <span class="mt-4 food_price">€{{ food.price}}</span>  
            <span class="btn cart_btn">add to cart</span>
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
@import 'resources/sass/variables';

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

.word-wrap {
  word-wrap: break-word;
}

.food_name {
  font-weight: 600;
  font-size: 1.5rem;
}

.food_price {
  font-weight: 600;
}

.cart_btn {
  background-color: $deliveboo;
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