<template>
    <div class="container" v-if="teams">
        <div class="panel panel-default">
            <div class="panel-body">
                <router-link class="btn btn-primary" to="/teams-create">Create New Team</router-link>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Teams</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                    <template v-if="!teams.length">
                        <tr>
                            <td colspan="2" class="text-center">No Teams Available</td>
                        </tr>
                    </template>
                    <template v-else>
                        <tr v-for="team in teams" :key="team.id">
                            <td>{{ team.id }}</td>
                            <td>{{ team.name }}</td>
                            <td>
                                <router-link :to="`/teams/${team.id}`">View</router-link>
                            </td>
                        </tr>
                    </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "TeamList",
        mounted() {
            axios.get('/api/teams')
                .then((response) => {
                    this.teams = response.data.teams;
                })
        },
        data() {
            return {
                teams: null
            }
        }
    }
</script>

<style scoped>

</style>