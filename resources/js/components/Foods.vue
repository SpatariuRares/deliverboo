<template>
<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-sm-8 col-md-6 col-lg-4" v-for="(food,index) in foods" :key="index">
      <div class="card">
        <!-- <img class="card-img" :src="require(`../storage/${food.thumb}`)" alt=""> -->
        <div class="card-img-overlay d-flex justify-content-end">
          <a href="#" class="card-link text-danger like">
            <i class="fas fa-heart"></i>
          </a>
        </div>
        <div class="card-body" >
          <h4 class="card-title">{{ food.name }}</h4>
            <p class="card-text">
                {{ food.ingredients}}
            </p>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success"><h5 class="mt-4">€{{ food.price}}</h5></div>
            <button href="#" type="submit" class="btn btn-success mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
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
          users: window.location.pathname // fatto da marco non rubare
        };
    },
    created() {
      this.getFoods();
    },
    methods: {
      getFoods(){
        axios.get(this.url + this.users + "/foods").
          then((response)=> {
            this.foods = response.data.foods;
          });
      },
      
    }
};

</script>