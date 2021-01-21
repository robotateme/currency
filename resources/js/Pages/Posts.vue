<template>
    <div>
        <b-table striped hover :items="items"></b-table>
    </div>
</template>

<script>
import {postsService} from '../Services';

export default {
    name: "Posts",
    data() {
        return {
            items: [
                {age: 40, first_name: 'Dickerson', last_name: 'Macdonald'},
                {age: 21, first_name: 'Larsen', last_name: 'Shaw'},
                {age: 89, first_name: 'Geneva', last_name: 'Wilson'},
                {age: 38, first_name: 'Jami', last_name: 'Carney'}
            ]
        }
    },

    created() {
        postsService.getAll().then(data => {
                this.items = data
            },
            error => {
                this.error = error;
                this.loading = false;
            })
    }
}
</script>

<style scoped>

</style>
