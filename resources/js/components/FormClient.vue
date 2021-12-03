<template>
	<form action="" method="post">
        <div class="form-group">
            <label for="email">email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Enter address">
        </div>
        <div class="form-group">
            <label for="fullName">FullName</label>
            <input type="text" name="fullName" class="form-control" id="fullName" placeholder="Enter fullName">
        </div>
        <button type="submit" class="btn btn-outline-secondary my-3">Submit</button>
    </form>
</template>

<script>
export default {
    name: "Formdata",
    data(){
        return {
            
		};
    },
}
</script>

<style lang="scss" scoped>


</style>