<template>
  <div class="container">
    <Main @outputSearch="search" :restaurants="restaurants" :categories="categories"/>
  </div>
</template>

<script>
import Main from "../components/Main.vue";
export default {
  name: "Restaurant",
  components: {
    Main
  },
  data() {
    return {
      restaurants: [],
      categories: [],
      url: "http://127.0.0.1:8000/api/restaurant",
    }
  },
  created() {
    this.getRestaurant();
  },
  methods: {
    search(text) {
      this.search = text;
    },
    getRestaurant() {
      axios
          .get(this.url)
          .then(response => {
            // console.log(response);
            this.restaurants = response.data.users;
            this.categories = response.data.categories;  
          })
          .catch((error) => {
            console.log(error);
          });
    },
  }
};
</script>

<style lang="scss" scoped>
</style>