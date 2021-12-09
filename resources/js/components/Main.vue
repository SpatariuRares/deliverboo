<template>
<div>
    <div class="container-fluid mb-4">
        <div class="row justify-content-center">
            <div class="card-category" @click="getData()">
                <img class="rounded" src="/images/all.jpg" alt="">
                <p class="">Tutte</p>
            </div>
            <div class="card-category" v-for="category in dataApi.categories" :key="category.id" @click="getRestaurantCat(category.id)">
                <img class="rounded" :src= "`/images/${category.slug}.jpg`" alt="">
                <p class="">{{ category.name }}</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row row-cols-2 row-cols-lg-4">
            <div class="col p-3 d-flex" v-for="(restaurant) in dataApi.users" :key="restaurant.id">
                <div class="card flex-fill">
                    <div class="card__header">
                        <img v-if="restaurant.thumb" :src="`storage/${restaurant.thumb}`" class="card__image" width="600">
                        <img v-else src="http://www.portofinoselecta.com/images/joomlart/demo/default.jpg" alt="">
                    </div>
                    <div class="card__body">
                        <a :href="'/' + restaurant.slug"><h4>{{restaurant.username}}</h4></a>
                        <p class="address">{{ restaurant.address }}</p>
                        <div v-if="!catFlag">
                            <span v-for="category in restaurant.category_id" :key="category">{{ category }} </span>
                        </div>
                        <div v-else>
                            <span v-for="category in restaurant.pivot.category_id" :key="category">{{ category }} </span>
                        </div>  
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
            catFlag:false,
        }
    },
    created() {
        this.getData();
    },
    methods: {
        getRestaurantCat(id) {
            axios.get("http://127.0.0.1:8000/api/categoryShow/" + id).then((response) => {
                this.dataApi.users = response.data.users;
                this.catFlag=true;
                var result = Object.keys(this.dataApi.users).map((key) => [this.dataApi.users[key]]);
                result.map((res,index)=> {
                    res = res[0];
                    result[index] = res;
                });


                result.map((restaurant)=>{
                    for(let i=0; i<restaurant.pivot.category_id.length; i++){
                        flag=true;
                        this.dataApi.categories.map((category)=>{
                            if(restaurant.pivot.category_id[i] != null && restaurant.pivot.category_id[i] == category.id && flag) {
                                restaurant.pivot.category_id[i] = category.name;
                                flag=false
                            }
                        })
                    }
                })
                console.log(response.data.users);
			})
        },
        getData() {
        axios
            .get(this.url)
            .then(response => {
                this.dataApi = response.data;
                this.catFlag=false;
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

    .container-fluid {

        .card-category {
            position: relative;
            cursor: pointer;
            margin: 10px 10px;

            &:hover img {
                -webkit-box-shadow: 0px 0px 12px 4px rgba(181,181,181,0.37); 
                box-shadow: 0px 0px 12px 4px rgba(181,181,181,0.37);
                filter:opacity(80%);
                transition: linear 100ms;
            }

            img {
                width: 150px;
                height: 100%;
                transition: linear 100ms;
            }

            p {
                text-align: center;
                width: 100%;
                background-color: rgba(255, 255, 255, 0.6);
                font-size: 17px;
                position: absolute;
                transform: translate(-50%, -50%);
                top: 50%;
                left: 50%;
                color: black;
                font-weight: 800;
                text-transform: capitalize;
            }
        }
    }

    .container {
        max-width: 1600px;
        gap: 2rem;

        .link_card {
            text-decoration: none;
            color: black;
        }

        .card {
            // display: flex;
            // flex-direction: column;
            // flex-basis: calc(1600px / 5 );
            // width: clamp(20rem, calc(20rem + 2vw), 22rem);
            // overflow: hidden;
            box-shadow: 0 2px 5px 1px rgba(0, 0, 0, .25);
            border-radius: 0.5em;
            background: #ECE9E6;
            background: linear-gradient(to right, #FFFFFF, #ECE9E6);

            &:hover {
                filter: brightness(0.9);
            }

            .card__header {
                height: 130px;

                img {
                    height: 100%;
                    width: 100%;
                    display: block;
                    object-fit: cover;
                }
            }

            .card__body {
                padding: 1rem;
                gap: .5rem;

                h4 {
                    font-weight: 600;
                    font-size: 1.1rem;
                    text-transform: capitalize;
                }

                a {
                    text-decoration: none;
                    color: black!important;
                    &:hover {
                        text-decoration: none;
                    }
                }

                .address {
                    font-size: 0.8rem;
                }

                p {
                    margin-bottom: 0;
                }
            }
        }
    }
    
</style>