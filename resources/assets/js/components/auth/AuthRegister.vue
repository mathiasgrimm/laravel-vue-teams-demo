<template>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Register</div>
            <div class="panel-body">
                <form class="form-horizontal" @submit.prevent="register">
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" v-model="user.name" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" v-model="user.email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" v-model="user.password" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="user.password_confirmation" required>
                        </div>
                    </div>

                    <div class="alert alert-danger" role="alert" v-if="error">{{ error }}</div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
    import {doLogin} from "../../auth";

    export default {
        name: "AuthRegister",
        methods: {
            register() {
                axios.post('/api/register', this.user)
                    .then((res) => {
                        doLogin(this.$data.user);
                    });
            }
        },
        data() {
            return {
                error: null,
                user: {
                    name: null,
                    email: null,
                    password: null,
                    password_confirmation: null
                }
            }
        }
    }
</script>

<style scoped>

</style>