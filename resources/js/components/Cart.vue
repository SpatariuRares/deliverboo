<template>
	<div class="p-3">
		<FormClient v-if="dataForm" @updateForm="FormData"/>
		<Payment v-if="brain && !dataForm" :authorization="token" @onSuccess="paymentOnSuccess"/>
		<div class="text-white p-3 bg-dark mt-3">
			<h3>Ecco il tuo ordine:</h3>
		
			<div v-if="showOrder.length!=0">
				<div v-for="(food,index) in showOrder" :key="food.id" class="row d-flex justify-content-between my-2">
					<div class="col-3 text-white">
						{{food.name}}
					</div>
					<div class="col-6 d-flex justify-content-between ">
						<button class="btn btn-sm circle btn-success" @click="minus(index)">-</button>{{form.quantity[index]}}<button class=" btn btn-sm circle btn-success" @click="plus(index)">+</button>
					</div>
					<div class="col-3 text-white">
						€{{food.price}}	
					</div>
				</div>	
			</div>
			<div>total:{{total}}€</div>
		</div>
	</div>	
</template>


<script>
import Payment from "../components/Payment.vue";
import FormClient from "../components/FormClient.vue";
export default {
    name: "Cart",
	components: {
		FormClient,
		Payment,
	},
	props:['cart'],
    data(){
        return {
			token: '',
			brain:false,
			dataForm:true,
			total:0,
			oldLength:0,
			showOrder:[],
			form: {
				dataClient:[],
				quantity:[],
				token:"",
				food:[],
			}
		};
    },
	created(){
		this.getToken();
	},
	watch: { 
      	cart: function() { // watch it
			this.form.food = this.cart;
			axios.post("http://127.0.0.1:8000/api/food/cart",{ ...this.form }).then((response) => {
				this.showOrder=response.data.cart;
				this.showOrder.map((food)=> {
					this.total+=food.price
				})
			})
			if(this.oldLength<this.cart.length){
				this.form.quantity.push(1);
			}
        }
	},
    methods: {
		getToken(){
			axios.get("http://127.0.0.1:8000/api/generate").then((response) => {
				this.token = response.data.token
				this.brain=true;
			})
		},
		paymentOnSuccess(nonce){
			this.form.token=nonce
			this.buy()
		},
		buy () {
			axios.post("http://127.0.0.1:8000/api/makepayment", { ...this.form }).then((response) => {
				//console.log(response)
				window.location.pathname="/checkout"
			})
		},
		minus(index){
			this.form.quantity[index]-=1;
			this.total -= this.showOrder[index]["price"];
			if(this.form.quantity[index]<1){
				this.form.quantity.splice(index,1)
				this.form.food.splice(index,1)
				this.showOrder.splice(index,1)
				this.$emit('deleteCartItem', index)
			}
			this.$forceUpdate();
		},
		plus(index){
			this.form.quantity[index]+=1;
			this.total += this.showOrder[index]["price"];
			this.$forceUpdate();
		},
		FormData(form){
			this.form.dataClient=form
			this.dataForm=false
		}
	}
}
</script>

<style lang="scss" scoped>

.body{
	margin: 0;
	padding: 0;
	height: 50vh;
	display: flex;
	justify-content:flex-end;
	align-items: center;
}

.Cart-Container{
	width: 70%;
	height: 85%;
	background-color: #ffffff;
	border-radius: 20px;
	box-shadow: 0px 25px 40px #1687d933;
}

.Header{
	margin: auto;
	width: 90%;
	height: 15%;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
.Heading{
	font-size: 20px;
	font-family: ‘Open Sans’;
	font-weight: 700;
	color: #2F3841;
}
.Action{
	font-size: 14px;
	font-family: ‘Open Sans’;
	font-weight: 600;
	color: #E44C4C;
	cursor: pointer;
	border-bottom: 1px solid #E44C4C;
}

.Cart-Items{
	margin: auto;
	width: 90%;
	height: 30%;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
.image-box{
    img {
        width: 30%;
        text-align: center;
    }
}

.title{
	padding-top: 5px;
	line-height: 10px;
	font-size: 32px;
	font-weight: 800;
	color: #202020;
}

.counter{
	width: 15%;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
.btn{
	width: 40px;
	height: 40px;
	border-radius: 50%;
	background-color: #d9d9d9;
	display: flex;
	justify-content: center;
	align-items: center;
	font-size: 20px;
	font-family: 'Open Sans';
	font-weight: 900;
	color: #202020;
	cursor: pointer;
}
.count{
	font-size: 20px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #202020;
}

.prices{
	height: 100%;
	text-align: right;
}
.amount{
	padding-top: 20px;
	font-size: 26px;
	font-family: 'Open Sans';
	font-weight: 800;
	color: #202020;
}
.save{
	padding-top: 5px;
	font-size: 14px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #1687d9;
	cursor: pointer;
}
.remove{
	padding-top: 5px;
	font-size: 14px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #E44C4C;
	cursor: pointer;
}

.pad{
	margin-top: 5px;
}

hr{
	width: 66%;
	float: right;
	margin-right: 5%;
}
.checkout{
	float: right;
	margin-right: 5%;
	width: 28%;
}
.total{
	width: 100%;
	display: flex;
	justify-content: space-between;
}
.Subtotal{
	font-size: 22px;
	font-family: 'Open Sans';
	font-weight: 700;
	color: #202020;
}
.items{
	font-size: 16px;
	font-family: 'Open Sans';
	font-weight: 500;
	color: #909090;
	line-height: 10px;
}
.total-amount{
	font-size: 36px;
	font-family: 'Open Sans';
	font-weight: 900;
	color: #202020;
}
.button{
	margin-top: 10px;
	width: 100%;
	height: 40px;
	border: none;
	background: linear-gradient(to bottom right, #B8D7FF, #8EB7EB);
	border-radius: 20px;
	cursor: pointer;
	font-size: 16px;
	font-family: 'Open Sans';
	font-weight: 600;
	color: #202020;
}


</style>