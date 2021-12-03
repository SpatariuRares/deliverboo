<template>
<div>
    <!-- <div class="col">
        <div class="row">
            <div>
                <a href="/">logo</a>
            </div>
            <form class="d-flex">
                <input v-model="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" @keyup="emit('outputSearch', search)">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div>
                <a class="btn btn-primary" href="/login">Accedi</a>
            </div>
            <div>
                <a class="btn btn-primary" href="/register">Registrati</a>
            </div>
        </div>

    </div> -->
    <div class="categories">
        <ul class="d-flex">
             <li @click="getData()">
                <p class="btn btn-success m-2 text-white">Tutte</p>
            </li>
            <li v-for="category in dataApi.categories" :key="category.id" @click="getRestaurantCat(category.id)">
                <p class="btn btn-success m-2 text-white">{{ category.name }}</p>
            </li>
        </ul>
    </div>

    <div class="container">
        <div class="card" v-for="(restaurant) in dataApi.users" :key="restaurant.id">
            <div class="card__header">
                <img v-if="restaurant.thumb" :src="`storage/${restaurant.thumb}`" class="card__image" width="600">
                <img v-else src="http://www.portofinoselecta.com/images/joomlart/demo/default.jpg" alt="">
            </div>
            <div class="card__body">
                <a :href="'/' + restaurant.slug"><h4>{{restaurant.username}}</h4></a>
                <p class="address">{{ restaurant.address }}</p>
                <p>{{  }}</p>
            </div>
        </div>
    </div>

</div>
</template>

<script>
// import Cart from "../components/Cart.vue";
export default {
    name: "Main",
    data() {
        return {
            dataApi: [],
            url: "http://127.0.0.1:8000/api/restaurant",
            // form : {
			// 	id : "",
			// }
            // categoryFilter: [],
        }
    },
    created() {
        this.getData();
    },
    methods: {
        getRestaurantCat(id) {
            // console.log(id);
            // this.form.id = id;
            // console.log(this.form.id);
            axios.get("http://127.0.0.1:8000/api/categoryShow/" + id).then((response) => {
				console.log(response)
                this.dataApi.users = response.data.users;
                console.log(response.data.users);
			})
        },
        getData() {
        axios
            .get(this.url)
            .then(response => {
                this.dataApi = response.data;
                // console.log(response.data);
            })
        },
    }
};


</script>

<style lang="scss" scoped>

    @import '~bootstrap/scss/bootstrap';

    *,
    *::before,
    *::after {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        max-width: 1200px;
        gap: 2rem;
    }

    .categories ul {
        display: inline-block;
    }

    .categories ul li {
        list-style: none;
        text-transform: capitalize;
    }

    img {
        max-height: 100%;
        max-width: 100%;
        display: block;
        object-fit: cover;
    }

    .card {
        display: flex;
        flex-direction: column;
        flex-basis: calc(1300px / 5 );
        // width: clamp(20rem, calc(20rem + 2vw), 22rem);
        overflow: hidden;
        box-shadow: 0 .1rem 1rem rgba(0, 0, 0, 0.1);
        border-radius: 0.5em;
        background: #ECE9E6;
        background: linear-gradient(to right, #FFFFFF, #ECE9E6);
    }

    .card__header {
        height: 130px;
    }

    .card__body {
        padding: 1rem;
        gap: .5rem;
    }

    p {
        margin-bottom: 0;
    }

    .address {
        font-size: 0.8rem;
    }

    a {
        text-decoration: none;
        color: black!important;
    }

    a:hover {
        text-decoration: none;
    }

    .card__body h4 {
        font-weight: 600;
        font-size: 1.1rem;
        text-transform: capitalize;
    }

    .card__footer {
        display: flex;
        padding: 1rem;
        margin-top: auto;
    }

</style>