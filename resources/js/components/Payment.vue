<template>
    <v-braintree
        :authorization = "authorization"
        @success="onSuccess"
        @error="onError"
        @load="onLoad"
    ></v-braintree>
</template>

<script>
export default {
name: "Payment",
props:["authorization"],
methods:{
    onLoad (){
        this.$emit("loading")
    },
    onSuccess (payload) {
            let nonce = payload.nonce;
            this.$emit("onSuccess",nonce)
        },
    onError (error) {
        let message = error.message;
            console.log(message)
        // Whoops, an error has occured while trying to get the nonce
        }
    }
}
</script>

<style lang="scss" scoped>
</style>