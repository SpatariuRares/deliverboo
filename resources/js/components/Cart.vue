<template>
	<div class="">
		<!-- <div class="border rounded p-5">
			<div class="Header">
				<h3 class="Heading">Shopping Cart</h3>
				<h5 class="Action">Remove all</h5>
			</div>
			<div class="d-flex justify-content-between align-items-center">
				<div class="image-box">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp-HDTllTjRKs7e9luW7TKTXiuW3vyuHAwiA&usqp=CAU"/>
				</div>
				<div class="about">
					<h2>Pizza</h2>
				</div>
				<div class="counter">
					<div class="btn">+</div>
					<div class="count">2</div>
					<div class="btn">-</div>
				</div>
				<div class="prices">
					<div class="amount">$2.99</div>
					<div class="save"><u>Save for later</u></div>
					<div class="remove"><u>Remove</u></div>
				</div>
			</div>
			<hr> 
			<div class="">
				<div class="total">
					<div>
						<div class="Subtotal">Sub-Total</div>
						<div class="items">2 items</div>
					</div>
					<div class="total-amount">$6.18</div>
				</div>
				<button class="button">Checkout</button>
			</div>
		</div> -->
		<Payment v-if="brain" :authorization="token" @onSuccess="paymentOnSuccess"/>
	</div>
	
</template>

<script>
import Payment from "../components/Payment.vue";
export default {
    name: "Cart",
	components: {
    	Payment,
	},
    data(){
        return {
			token: '',
			brain:false,
			form: {
				token:"",
				food:[],
			}
		};
    },
	created(){
		this.getToken();
	},
    methods: {
		getToken(){
			axios.get("http://127.0.0.1:8000/api/generate").then((response) => {
				this.token = response.data.token
				//console.log("token: " + response.data.token)
				this.brain=true;
			})
		},
		paymentOnSuccess(nonce){
			this.form.token=nonce
			this.buy()
		},
		buy () {
			axios.post("http://127.0.0.1:8000/api/makepayment", { ...this.form }).then((response) => {
				console.log(response)
				window.location.pathname="/checkout"
			})
			
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