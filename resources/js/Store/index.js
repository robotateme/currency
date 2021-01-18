import Vue from 'vue';
import Vuex from 'vuex'

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        count: 0,
        loggedIn: false
    },
    mutations: {
        INCREMENT(state) {
            state.count++
        },
        LOGIN(state) {
            state.loggedIn = true
        },
        LOGOUT(state) {
            state.loggedIn = false
        }
    },
    actions: {}
})


export default store;
