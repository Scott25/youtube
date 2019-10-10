<template>

    <div style="width: 49%;position: relative;left: 20%;">
        <form @submit="createUser">

            <strong>Firstname:</strong>
            <input type="text" class="form-control" required="true" v-model="fname">

            <strong>Lastname:</strong>
            <input type="text" class="form-control" required="true" v-model="lname">

            <strong>Email:</strong>
            <input type="email" class="form-control" required="true" v-model="email">

            <strong>Password:</strong>
            <input type="password" class="form-control" required="true" v-model="password">
            <button class="btn btn-success">Register</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Registration",
        data() {
            return {
                fname: '',
                lname: '',
                email: '',
                password: ''
            };
        },
        methods: {
            createUser(e) {
                e.preventDefault();
                axios.post('/createNewUser', {
                    email: this.email,
                    fname: this.fname,
                    lname: this.lname,
                    password: this.password
                })
                    .then(function (response) {
                        location.href = '/login';
                    })
                    .catch(function (error) {});
            }
        }
    }
</script>

<style scoped>

</style>
