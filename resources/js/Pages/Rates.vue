<template>
    <div class="overflow-auto">
        <b-table small dark striped hover fixed bordered :items="items">
        </b-table>
    </div>
</template>

<script>
import {ratesService} from "../Services";

export default {
    name: "Rates",
    data() {
        return {
            links: {},
            items: {},
            meta: {},
        }
    },

    created() {
        ratesService.getAll().then(rates => {
                for (let k in rates.data) {
                    let obj = rates.data[k];
                    if (obj.type === 'rates') {
                        rates.data[k].message = JSON.parse(obj.message)
                    }
                }
                this.items = rates.data;
                this.meta = rates.meta;
            },
            error => {
                this.error = error;
                this.loading = false;
            })
    },

    methods: {}
}
</script>

<style scoped>

</style>
