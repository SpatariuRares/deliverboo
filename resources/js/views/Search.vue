
<template>
    <div class="col h-100 d-flex align-items-center justify-content-center search-bar">
        <div class="d-flex w-25 h-75">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            <input v-model="form.search" @keyup="getResta()" class="w-100" type="search" placeholder="Digita il ristorante che vuoi cercare" aria-label="Search">
        </div>
        <table class="position-absolute top-100 table-search" v-if="restaurants.length != 0">
            <tr>
                <th>{{nome}}</th>
            </tr>
            <tr v-for="restaurant in restaurants" :key="restaurant.id" class="item">
                <td><a :href="'/' + restaurant.slug"><h4>{{restaurant.username}}</h4></a></td>
            </tr>
        </table>
    </div>
</template>

<script>

export default ({
    name: "Search",
    data() {
        return {
            form : {
                search:"",
            },
            restaurants: [],
        }
    },
    methods: {
        getResta() {
            if(this.form.search != "") {
                axios.post("http://127.0.0.1:8000/api/restaurant/search",{ ...this.form}).then((response) => {
                    this.restaurants = response.data
                });
            }
            else {
                this.restaurants = [];
            }
        }
    }
})
</script>

<style scoped lang="scss">
@import 'resources/sass/variables';
.search-bar {
    margin-bottom: 10px;

    .table-search {
        z-index: 9999;
        border: 1px solid rgba(0, 0, 0, 0.4);
        width: 50%;
        top: 100%;
        background-color: white;
        tr {
            border-bottom: 1 px solid rgba(0, 0, 0, 0.4);
        }
    }
    span {
        border-right: none;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        background-color: #F5F5F5;
        color: lightgray;
    }
    input[type="search"], textarea {
        border: 1px solid lightgray;
        border-left: none;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        background-color : #F5F5F5; 
        outline: none;
        }
    input {
        &::placeholder{
            color: rgb(199, 199, 199);
        }
    }
    a {
        color: black;
        &:hover{
            text-decoration: none;
        }
    }
    .item:hover {
        background: rgba($color: $deliveboo, $alpha: 0.2);
    }
}

</style>