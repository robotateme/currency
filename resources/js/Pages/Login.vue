<template>
    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Login</h1>
<!--                        <message v-if="error" type="danger">{{ error }}</message>-->
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label for="email-field">Email address</label>
                                <input type="email" class="form-control" id="email-field" placeholder="Enter email"
                                       v-model="email"/>
                            </div>
                            <div class="form-group">
                                <label for="password-field">Password</label>
                                <input type="password" class="form-control" id="password-field" placeholder="Password"
                                       v-model="password"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            email: null,
            password: null,
            error: false
        }
    },
    methods: {
        login() {
            var app = this
            this.$auth.login({
                params: {
                    email: app.email,
                    password: app.password
                },
                success: function () {
                },
                error: function () {
                },
                rememberMe: true,
                redirect: '/profile',
                fetchUser: true,
            });
        },
    }
}
</script>

<style scoped>

</style>
