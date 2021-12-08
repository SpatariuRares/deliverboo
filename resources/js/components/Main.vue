<template>
<div>
    <div class="container mb-4">
        <div class="row ">
            <div @click="getData()" class="col-2 my-2">
                <div class="btn btn-success text-white d-flex justify-content-center align-items-center" id="allCategory">
                    <p>Tutte</p>
                </div>
            </div>
            <div class="col-2 my-2" v-for="category in dataApi.categories" :key="category.id" @click="getRestaurantCat(category.id)">
                <img class="rounded" :src= "`/images/${category.slug}.jpg`" alt="">
                <p class="category_name text-white">{{ category.name }}</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row row-cols-2 row-cols-lg-4">
            <div class=" p-3 " v-for="(restaurant) in dataApi.users" :key="restaurant.id">
                <div class="card">
                    <div class="card__header">
                        <img v-if="restaurant.thumb" :src="`storage/${restaurant.thumb}`" class="card__image" width="600">
                        <img v-else src="http://www.portofinoselecta.com/images/joomlart/demo/default.jpg" alt="">
                    </div>
                    <div class="card__body">
                        <a :href="'/' + restaurant.slug"><h4>{{restaurant.username}}</h4></a>
                        <p class="address">{{ restaurant.address }}</p>
                        <p v-for="category in restaurant.category_id" :key="category">{{ category }}</p>
                    </div>
                </div>
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
				// console.log(response)
                this.dataApi.users = response.data.users;
                // console.log(response.data.users);
			})
        },
        getData() {
        axios
            .get(this.url)
            .then(response => {
                this.dataApi = response.data;
                let flag = true;
                var result = Object.keys(this.dataApi.users).map((key) => [this.dataApi.users[key]]);
                result.map((res,index)=> {
                    res = res[0];
                    result[index] = res;
                });


                result.map((restaurant)=>{
                    for(let i=0; i<restaurant.category_id.length; i++){
                        flag=true;
                        this.dataApi.categories.map((category)=>{
                            if(restaurant.category_id[i] != null && restaurant.category_id[i] == category.id && flag) {
                                restaurant.category_id[i] = category.name;
                                flag=false
                            }
                        })
                    }
                })
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

    #allCategory{
        height: 100%;
    }
    .p-relative{
        position: relative;
    }

    .category_name {
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
    }

    img {
        height: 100%;
        width: 100%;
        display: block;
        object-fit: cover;
    }

    .card {
        // display: flex;
        // flex-direction: column;
        // flex-basis: calc(1300px / 5 );
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