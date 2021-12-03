<template>
	<div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="email" v-model="form.email" name="email" class="form-control" id="email" required placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" v-model="form.address" name="address" class="form-control" id="address" required placeholder="Enter address">
        </div>
        <div class="form-group">
            <label for="fullName">FullName</label>
            <input type="text" v-model="form.fullName" name="fullName" class="form-control" id="fullName" required placeholder="Enter fullName">
        </div>
        <button @click="checkform()" type="submit" class="btn btn-outline-secondary my-3">Submit</button>
    </div>
</template>

<script>
export default {
    name: "Formdata",
    data(){
        return {
            form: {
                email: "",
                fullName: "",
                address: "",
            }
		};
    },
    methods: {
        checkform(){
            if(this.form.email.includes("@") && this.form.email.includes(".") && this.form.email.indexOf("@")<this.form.email.indexOf(".")){
                this.updateForm();
            }
        },
        updateForm(){
            this.$emit('updateForm', this.form)
        }
    }
}
</script>

<style lang="scss" scoped>


</style>