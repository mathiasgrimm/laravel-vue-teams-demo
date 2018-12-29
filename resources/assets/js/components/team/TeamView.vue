<template>
    <div class="container" v-if="team">
        <div class="panel panel-default">
            <div class="panel-heading">Team</div>
            <div class="panel-body">
                <form  @submit.prevent="save">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="id" v-model="team.id" disabled>
                    </div>

                    <div class="form-group">
                        <label for="created_at">Created</label>
                        <input type="text" class="form-control" id="created_at" v-model="team.created_at.date" disabled>
                    </div>

                    <div class="form-group">
                        <label for="updated_at">Updated</label>
                        <input type="text" class="form-control" id="updated_at" v-model="team.updated_at.date" disabled>
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" v-model="team.name">
                    </div>

                    <button type="submit" class="btn btn-default">Save</button>
                    <router-link class="btn" to="/teams">Back to all teams</router-link>
                </form>
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
                    </thead>
                    <tbody>
                        <tr v-for="player in team.players" :key="player.id">
                            <td>{{ player.id }}</td>
                            <td>{{ player.first_name}}</td>
                            <td>{{ player.last_name}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TeamView",
        methods: {
            save() {
                axios.put(`/api/teams/${this.$route.params.id}`, this.team)
                    .then((response) => {
                        this.$router.push('/teams')
                    });
            }
        },
        mounted() {
            axios.get(`/api/teams/${this.$route.params.id}`)
                .then((response) => {
                    this.team = response.data.team
                });
        },
        data() {
            return {
                team: null
            }
        }
    }
</script>

<style scoped>

</style>