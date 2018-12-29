<template>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
                <form class="form-horizontal" @submit.prevent="authenticate">
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
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Login
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
        name: "AuthLogin",
        methods: {
            authenticate() {
                doLogin(this.$data.user);
            }
        },
        data() {
            return {
                user: {
                    email: null,
                    password: null
                }
            }
        }
    }
</script>

<style scoped>

</style>