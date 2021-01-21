<template>
    <div>
        <b-table small dark striped hover fixed bordered
                 :items="items"
        >

        </b-table>
    </div>
</template>

<script>
import {notificationsService} from "../Services";

export default {
name: "Notifications",
    data() {
        return {
            links: {},
            items: {}
        }
    },

    created() {
        notificationsService.getAll().then(notifications => {
                for (let k in notifications.data) {
                    let obj = notifications.data[k];
                    if (obj.type === 'rates') {
                        notifications.data[k].message = JSON.parse(obj.message)
                    }
                }
                this.items = notifications.data;
            },
            error => {
                this.error = error;
                this.loading = false;
            })
    },

    methods: {
    }
}
</script>

<style scoped>

</style>
