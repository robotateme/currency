<template>
    <div>
        <template>
            <div>
                <b-navbar toggleable="lg" type="dark" variant="dark">
                    <b-navbar-brand :to="{name: 'home'}">Laravel [Store count: {{$store.state.count}}][Logged in: {{$store.state.loggedIn}}]</b-navbar-brand>
                    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
                    <b-collapse id="nav-collapse" is-nav>
                        <!-- Right aligned nav items -->
                        <b-navbar-nav class="ml-auto">
                            <b-navbar-nav v-if="$store.state.loggedIn">
                                <b-nav-item :to="{name: 'home'}">Home</b-nav-item>
                                <b-nav-item :to="{name: 'about'}">About</b-nav-item>
                                <b-nav-item :to="{name: 'profile'}">Profile</b-nav-item>
                                <b-nav-item :to="{name: 'notifications'}">Notifications</b-nav-item>
                                <b-nav-item :to="{name: 'posts'}">Posts</b-nav-item>
                                <b-nav-item :to="{name: 'rates'}">Rates</b-nav-item>
                                <b-nav-item :to="{name: 'login'}"><span>Logout</span>
                                </b-nav-item>
                            </b-navbar-nav>
                            <b-navbar-nav v-else>
                                <b-nav-item :to="{name: 'home'}">Home</b-nav-item>
                                <b-nav-item :to="{name: 'about'}">About</b-nav-item>
                                <b-nav-item :to="{name: 'posts'}">Posts</b-nav-item>
                                <b-nav-item :to="{name: 'rates'}">Rates</b-nav-item>
                                <b-nav-item :to="{name: 'login'}"><span>Login</span>
                                </b-nav-item>
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
import {mapState} from 'vuex';

export default {
    name: 'Navbar',
}
</script>

<style scoped>

</style>
