<template>
<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp-HDTllTjRKs7e9luW7TKTXiuW3vyuHAwiA&usqp=CAU" alt="Vans">
        <div class="card-img-overlay d-flex justify-content-end">
          <a href="#" class="card-link text-danger like">
            <i class="fas fa-heart"></i>
          </a>
        </div>
        <div class="card-body" v-for="(food,index) in foods" :key="index">
          <h4 class="card-title">{{ food.name }}</h4>
            <p class="card-text">
                ingredients
            </p>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success"><h5 class="mt-4">€125</h5></div>
            <button href="#" type="submit" class="btn btn-success mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp-HDTllTjRKs7e9luW7TKTXiuW3vyuHAwiA&usqp=CAU" alt="Vans">
        <div class="card-img-overlay d-flex justify-content-end">
          <a href="#" class="card-link text-danger like">
            <i class="fas fa-heart"></i>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">Pizza Margherita</h4>
            <p class="card-text">
                ingredients
            </p>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success"><h5 class="mt-4">€125</h5></div>
            <button href="#" type="submit" class="btn btn-success mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp-HDTllTjRKs7e9luW7TKTXiuW3vyuHAwiA&usqp=CAU" alt="Vans">
        <div class="card-img-overlay d-flex justify-content-end">
          <a href="#" class="card-link text-danger like">
            <i class="fas fa-heart"></i>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">Pizza Margherita</h4>
            <p class="card-text">
                ingredients
            </p>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success"><h5 class="mt-4">€125</h5></div>
            <button href="#" type="submit" class="btn btn-success mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp-HDTllTjRKs7e9luW7TKTXiuW3vyuHAwiA&usqp=CAU" alt="Vans">
        <div class="card-img-overlay d-flex justify-content-end">
          <a href="#" class="card-link text-danger like">
            <i class="fas fa-heart"></i>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">Pizza Margherita</h4>
            <p class="card-text">
                ingredients
            </p>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success"><h5 class="mt-4">€125</h5></div>
            <button href="#" type="submit" class="btn btn-success mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp-HDTllTjRKs7e9luW7TKTXiuW3vyuHAwiA&usqp=CAU" alt="Vans">
        <div class="card-img-overlay d-flex justify-content-end">
          <a href="#" class="card-link text-danger like">
            <i class="fas fa-heart"></i>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">Pizza Margherita</h4>
            <p class="card-text">
                ingredients
            </p>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success"><h5 class="mt-4">€125</h5></div>
            <button href="#" type="submit" class="btn btn-success mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp-HDTllTjRKs7e9luW7TKTXiuW3vyuHAwiA&usqp=CAU" alt="Vans">
        <div class="card-img-overlay d-flex justify-content-end">
          <a href="#" class="card-link text-danger like">
            <i class="fas fa-heart"></i>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">Pizza Margherita</h4>
            <p class="card-text">
                ingredients
            </p>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success"><h5 class="mt-4">€125</h5></div>
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
    name: "Main",
    data() {
        return {
          url: "http://127.0.0.1:8000/api/",
          foods: [],
        };
    },
    created() {
      this.getFoods();
    },
    methods: {
      getFoods(){
        axios.get(this.url + "lorenzo" + "/foods").
          then((response)=> {
            this.foods = response.data.foods
          });
      }
    },
};
</script>