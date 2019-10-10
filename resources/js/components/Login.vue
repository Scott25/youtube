<template>
    <div style="width: 49%;position: relative;left: 20%;">
        <form @submit="formSubmit">

            <strong>Email:</strong>
            <input type="email" class="form-control" required="true" v-model="email">

            <strong>Password:</strong>
            <input type="password" class="form-control" required="true" v-model="password">

            <button class="btn btn-success">Login</button>
        </form>
    </div>
</template>


<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                email: '',
                password: ''
            };
        },
        methods: {
            formSubmit(e) {
                e.preventDefault();
                axios.post('/userLogin', {
                    email: this.email,
                    password: this.password
                })
                    .then(function (response) {
                        if(response.data === 1) {
                            location.href = '/userDetails';
                        } else {
                            location.href = '/admin';
                        }
                    })
                    .catch(function (error) {});
            }
        }
    }

</script>
