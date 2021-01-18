<template>
    <div>
        <b-form @submit.prevent="onSubmit" @reset="onReset" v-if="show">
            <b-form-group
                id="input-group-1"
                label="Email:"
                label-for="input-1"
                description="We'll never share your email with anyone else."
            >
                <b-form-input
                    id="input-1"
                    v-model="form.email"
                    type="email"
                    placeholder="Enter email"
                    required
                ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Password:" label-for="input-2">
                <b-form-input
                    id="input-2"
                    type="password"
                    v-model="form.password"
                    placeholder="Password"
                    required
                ></b-form-input>
            </b-form-group>

            <b-button type="submit" variant="primary">Submit</b-button>
            <b-button type="reset" variant="danger">Reset</b-button>
        </b-form>
        <b-card class="mt-3" header="Form Data Result">
            <pre class="m-0">{{ form }}</pre>
        </b-card>
    </div>
</template>

<script>
import {authService} from '../Services';

export default {
    name: "login",
    data() {
        return {
            form: {
                email: '',
                password: '',
            },
            show: true,
            submitted: false
        }
    },
    created() {
        authService.logout();
        this.returnUrl = this.$route.query.returnUrl || '/';
    },

    methods: {
        onSubmit(event) {
            event.preventDefault()
            this.submitted = true;
            const {email, password} = this.form;
            authService.login(email, password)
                .then(user => {
                        this.$router.push(this.returnUrl)
                    },
                error => {
                    this.error = error;
                    this.loading = false;
                }
            );
        },

        onReset(event) {
            event.preventDefault()
            this.form.email = ''
            this.form.password = ''
            this.show = false
            this.$nextTick(() => {
                this.show = true
            })
        }
    }
}
</script>
