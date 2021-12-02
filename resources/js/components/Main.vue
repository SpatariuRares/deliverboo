<template>
  <div class="container">
        <div class="col">
            <form class="d-flex">
                <input v-model="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" @keyup="emit('outputSearch', search)">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div>
                <ul v-for="(category, index) in categories" :key="index">
                    <a href="">
                        <li>{{ category.name }}</li>
                    </a>
                </ul>
            </div>
        </div>
        <div v-for="(restaurant) in restaurants" :key="restaurant.id">
            <img :src="`storage/${restaurant.thumb}`" alt="">
            <a href=""><h2>{{ restaurant.username }}</h2></a> 
        </div>
  </div>
</template>

<script>
// import Cart from "../components/Cart.vue";
export default {
    name: "Main",
    props: [
        "restaurants",
        "categories"
        ],
    data() {
        return {
            search: "",
            textSearch: [],
        }
    },
    created() {
        this.input;
        },
    methods: {
        
        input(e) {
            console.log(e);
        },
        getSearch() {
            this.textSearch.forEach
        }
    },
    };
</script>

<style lang="scss" scoped>
ul {
    display: inline-block;
    li {
        list-style: none;
    }
}
</style>