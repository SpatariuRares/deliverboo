<template>
<div class="container">
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
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet, explicabo cum tenetur alias quaerat quos impedit dolorem, iure doloribus possimus laboriosam consequatur corporis eos. Voluptas cumque dolor inventore magni fuga!
            </p>
          <div class="options d-flex flex-fill">
              <select class="custom-select mr-1">
                <option selected>Color</option>
                <option value="1">Green</option>
                <option value="2">Blue</option>
                <option value="3">Red</option>
              </select>
            <select class="custom-select ml-1">
                <option selected>Size</option>
                <option value="1">41</option>
                <option value="2">42</option>
                <option value="3">43</option>
            </select>
          </div>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success"><h5 class="mt-4">€125</h5></div>
            <button href="#" type="submit" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
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