<template>
    <div class="container">
        <div class="header clearfix">
            <nav>
                <ul class="nav nav-pills pull-right">
                    <template v-if="!currentUser">
                        <li role="presentation">
                            <router-link to="/register">Register</router-link>
                        </li>

                        <li role="presentation">
                            <router-link to="/login">Login</router-link>
                        </li>
                    </template>
                    <template v-else>
                        <li role="presentation">
                            <router-link to="/teams">Teams</router-link>
                        </li>

                        <li role="presentation">
                            <router-link to="/players">Players</router-link>
                        </li>
                        <li role="presentation">
                            <a href="#!" @click.prevent="logout">Logout</a>
                        </li>

                        <li role="presentation">
                            <a href="#!"  class="dropdown-item">{{ currentUser.name }}</a>
                        </li>

                    </template>

                </ul>
            </nav>
            <h3 class="text-muted">Demo - Mathias Grimm</h3>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Header',
        methods: {
            logout() {
                this.$store.commit('logout');
                this.$router.push('/login');
            }
        },
        mounted() {
            // TODO
            if (this.$store.getters.currentUser) {
                axios.defaults.headers.common["Authorization"] = `Bearer ${this.$store.getters.currentUser.token}`;
            }
        },
        computed: {
            currentUser() {
                return this.$store.getters.currentUser
            }
        }
    }
</script>
