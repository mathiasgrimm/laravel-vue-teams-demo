<template>
    <div class="container" v-if="players">
        <div class="panel panel-default">
            <div class="panel-body">
                <router-link class="btn btn-primary" to="/players-create">Create New Player</router-link>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Players</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Team ID</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                        <tr v-for="player in players" :key="player.id">
                            <td>{{ player.id }}</td>
                            <td>{{ player.first_name }}</td>
                            <td>{{ player.last_name }}</td>
                            <td>{{ player.team_id }}</td>
                            <td>
                                <router-link :to="`/players/${player.id}`">View</router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "PlayerList",
        mounted() {
            axios.get('/api/players')
                .then((response) => {
                    this.players = response.data.players;
                })
        },
        data() {
            return {
                players: null
            }
        }
    }
</script>

<style scoped>

</style>