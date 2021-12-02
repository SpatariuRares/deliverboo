<template>
<div class="container">
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

        <div>
            <ul v-for="(category, index) in categories" :key="index">
                <a href="">
                    <li>{{ category.name }}</li>
                </a>
            </ul>
        </div>
    </div> -->

    <div class="card" v-for="(restaurant) in restaurants" :key="restaurant.id">
        <div class="card__header">
            <img :src="`storage/${restaurant.thumb}`" class="card__image" width="600">
        </div>
        <div class="card__body">
            <span class="tag tag-blue">Technology</span>
            <a :href="'/' + restaurant.slug"><h4>{{restaurant.username}}</h4></a>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p>
        </div>
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
        this.input();

        },
    methods: {
        
            input(e) {
                console.log(e);
            },
            getSearch() {
                this.textSearch.forEach
            },
        },
    };

</script>

<style lang="scss" scoped>
@import '~bootstrap/scss/bootstrap';

ul {
    display: inline-block;
    li {
        list-style: none;
    }
}

//////////


*,
*::before,
*::after {
box-sizing: border-box;
padding: 0;
margin: 0;
}

.bod {
font-family: "Quicksand", sans-serif;
display: grid;
place-items: center;
height: 100vh;
background: #7f7fd5;
background: linear-gradient(to right, #91eae4, #86a8e7, #7f7fd5);
}

.container {
display: flex;
flex-wrap: wrap;
justify-content: center;
max-width: 1200px;
margin-block: 2rem;
gap: 2rem;
}

img {
max-width: 100%;
display: block;
object-fit: cover;
}

.card {
display: flex;
flex-direction: column;
width: clamp(20rem, calc(20rem + 2vw), 22rem);
overflow: hidden;
box-shadow: 0 .1rem 1rem rgba(0, 0, 0, 0.1);
border-radius: 1em;
background: #ECE9E6;
background: linear-gradient(to right, #FFFFFF, #ECE9E6);
}



.card__body {
padding: 1rem;
display: flex;
flex-direction: column;
gap: .5rem;
}


.tag {
align-self: flex-start;
padding: .25em .75em;
border-radius: 1em;
font-size: .75rem;
}

.tag + .tag {
margin-left: .5em;
}

.tag-blue {
background: #56CCF2;
background: linear-gradient(to bottom, #2F80ED, #56CCF2);
color: #fafafa;
}

.tag-brown {
background: #D1913C;
background: linear-gradient(to bottom, #FFD194, #D1913C);
color: #fafafa;
}

.tag-red {
background: #cb2d3e;
background: linear-gradient(to bottom, #ef473a, #cb2d3e);
color: #fafafa;
}

.card__body h4 {
font-size: 1.5rem;
text-transform: capitalize;
}

.card__footer {
display: flex;
padding: 1rem;
margin-top: auto;
}

.user {
display: flex;
gap: .5rem;
}

.user__image {
border-radius: 50%;
}

.user__info > small {
color: #666;
}

</style>