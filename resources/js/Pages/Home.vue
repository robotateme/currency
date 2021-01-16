<template>
    <div class="home">
        <h1>
            {{ count }}
        </h1>
        <fieldset>
            <p>
                <input type="button" @click="$store.commit('INCREMENT')" value="INCREMENT">
            </p>
        </fieldset>
    </div>
</template>

<script>
import {mapState} from 'vuex';

export default {
    name: "home",
    computed: {
        ...mapState({
            count: state => state.count
        }),
    }
}
</script>

<style scoped>

</style>
