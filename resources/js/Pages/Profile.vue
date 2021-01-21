<template>
    <div>
        <!-- Styled -->
        <b-form-file
            v-model="form.avatar_image"
            :state="Boolean(form.avatar_image)"
            placeholder="Choose a file or drop it here..."
            drop-placeholder="Drop file here..."
            v-on:change="onChangeFile"
        ></b-form-file>
        <div class="mt-3">Selected file: {{ form.avatar_image ? form.avatar_image.name : '' }}</div>
    </div>
</template>

<script>
import {profileService} from '../Services';
import _ from 'lodash'

export default {
    name: "Profile",
    data() {
        return {
            form: {
                avatar_image: null,
            },
            submitted: false
        }
    },
    created() {
        this.returnUrl = this.$route.query.returnUrl || '/';
    },

    methods: {
        onSubmit(event) {

            profileService.uploadAvatar(formData)
        },
        onChangeFile(event) {
            let formData = new FormData();
            formData.append('avatar_image', event.target.files[0]);
            profileService.uploadAvatar(formData)
        }
    }
}
</script>

<style scoped>

</style>
