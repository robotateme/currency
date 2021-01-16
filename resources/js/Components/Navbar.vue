<template>
    <div>
        <template>
            <div>
                <b-navbar toggleable="lg" type="dark" variant="dark">
                    <b-navbar-brand :to="{name: 'home'}">Currency-Test</b-navbar-brand>
                    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
                    <b-collapse id="nav-collapse" is-nav>
                        <!-- Right aligned nav items -->
                        <b-navbar-nav class="ml-auto">
                            <b-navbar-nav>
                                <b-nav-item :to="{name: 'home'}">Home</b-nav-item>
                                <b-nav-item :to="{name: 'about'}">About</b-nav-item>
                                <b-nav-item :to="{name: 'profile'}">Profile</b-nav-item>
                                <b-nav-item :to="{name: 'notifications'}">Notifications</b-nav-item>
                                <b-nav-item :to="{name: 'posts'}">Posts</b-nav-item>
                                <b-nav-item :to="{name: 'rates'}">Rates</b-nav-item>
                                <b-nav-item :to="{name: 'login'}">Login</b-nav-item>
                                <b-nav-item :to="{name: 'logout'}">LogOut</b-nav-item>
                            </b-navbar-nav>
                        </b-navbar-nav>
                    </b-collapse>
                </b-navbar>
            </div>
        </template>
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
export default {
    name: 'Navbar',
}
</script>

<style scoped>

</style>
