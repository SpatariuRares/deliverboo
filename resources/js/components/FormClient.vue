<template>
	<form @submit.prevent="checkform()">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" ref="email" name="email" class="form-control" id="email" required placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text"  ref="address" name="address" class="form-control" id="address" required placeholder="Enter address">
        </div>
        <div class="form-group">
            <label for="fullName">FullName</label>
            <input type="text"  ref="fullName" name="fullName" class="form-control" id="fullName" required placeholder="Enter fullName">
        </div>
        <button type="submit" class="btn btn-outline-secondary my-3">Submit</button>
    </form>
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
            this.form.email = this.$refs.email.value
            this.form.address = this.$refs.address.value
            this.form.fullName = this.$refs.fullName.value
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