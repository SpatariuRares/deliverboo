<template>
	<div class="px-3">
		<FormClient v-if="dataForm" @updateForm="FormData"/>
		<Payment v-if="brain && !dataForm" :authorization="token" @onSuccess="paymentOnSuccess"/>
		<div class="text-white p-3 bg-dark rounded mt-3">
			<h3>Ecco il tuo ordine:</h3>
		
			<div v-if="showOrder.length!=0" class="border-bottom pb-2 mb-2">
				<div v-for="(food,index) in showOrder" :key="food.id" class="row d-flex justify-content-between my-2">
					<div class="col-3 text-white cart_food_name">
						{{food.name}}
					</div>
					<div class="col-7 d-flex justify-content-around">
						<button class="btn circle btn-secondary" @click="minus(index)">-</button>{{form.quantity[index]}}<button class="btn circle btn-secondary" @click="plus(index)">+</button>
					</div>
					<div class="col-2 text-white cart_food_price d-flex justify-content-end">
						€{{food.price}}	
					</div>
				</div>	
			</div>
			<div><span class="cart_food_name">Total:</span><span class="cart_food_price"> {{total}}€</span></div>
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
	props:['cart',"reset"],
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
	mounted() {
		if (localStorage.getItem('quantity')) {
			try {
				this.form.quantity = JSON.parse(localStorage.getItem('quantity'));
			} catch(e) {
				localStorage.removeItem('quantity');
			}
		}
		if (localStorage.getItem('total')) {
			try {
				this.total = JSON.parse(localStorage.getItem('total'));
			} catch(e) {
				localStorage.removeItem('total');
			}
		}
		if (localStorage.getItem('oldLength')) {
			try {
				this.oldLength = JSON.parse(localStorage.getItem('oldLength'));
			} catch(e) {
				localStorage.removeItem('oldLength');
			}
		}
	},
	watch: { 
      	cart: function() { // watch it
			if(this.reset){
				this.form.quantity=[];
				this.total = 0;
				this.oldLength=0
			}
			// localStorage.cart = this.cart;
			this.form.food = this.cart;
			this.showOrder=this.cart;
			if(this.oldLength < this.cart.length){
				this.total = 0;
				this.cart.map((food)=> {
					this.total+=food.price
				})
				this.form.quantity.push(1);
				this.oldLength=this.cart.length
			}
			this.savecart();
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
		
				localStorage.removeItem('cart');
				localStorage.removeItem('total');
				localStorage.removeItem('randid');
				localStorage.removeItem('oldLength');
				localStorage.removeItem('quantity');
				while ((localStorage.getItem('cart') != null && localStorage.getItem('total') != null && localStorage.getItem('randid') != null && localStorage.getItem('oldLength') != null && localStorage.getItem('quantity') != null)) {}
					window.location.pathname="/checkout"
			})
		},
		minus(index){
			this.form.quantity[index]-=1;
			this.total -= this.showOrder[index]["price"];
			if(this.form.quantity[index]<1){
				this.form.quantity.splice(index,1)
				this.form.food.splice(index,1	)
				// this.oldLength=this.cart.length
				this.$emit('deleteCartItem', index)
			}
			this.savecart();
			this.$forceUpdate();
		},
		plus(index){
			this.form.quantity[index]+=1;
			this.total += this.showOrder[index]["price"];
			this.savecart();
			this.$forceUpdate();
		},
		FormData(form){
			this.form.dataClient=form
			this.dataForm=false
		},
		savecart(){
			let quantity = JSON.stringify(this.form.quantity);
			localStorage.setItem('quantity', quantity);
			let total = JSON.stringify(this.total);
			localStorage.setItem('total', total);
			let oldLength = JSON.stringify(this.oldLength);
			localStorage.setItem('oldLength', oldLength);
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
	display: flex;
	justify-content: center;
	align-items: center;
	font-size: 20px;
	font-family: 'Open Sans';
	font-weight: 900;
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

.cart_food_name {
	font-size: 20px;
}

.cart_food_price {
	font-size: 15px;
	font-weight: bold;
}


</style>