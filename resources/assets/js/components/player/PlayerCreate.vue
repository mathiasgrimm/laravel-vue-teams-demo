<template>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Create Player</div>
            <div class="panel-body">
                <form @submit.prevent="save">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" v-model="player.first_name">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" v-model="player.last_name">
                    </div>

                    <div class="form-group">
                        <label for="team_id">Team ID</label>
                        <input type="text" class="form-control" id="team_id" v-model="player.team_id">
                    </div>

                    <button type="submit" class="btn btn-default">Save</button>
                    <router-link class="btn" to="/teams">Back to all players</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PlayerCreate",
        methods: {
            save() {
                axios.post('/api/players', this.player)
                    .then((response) => {
                        this.$router.push('/players')
                    });
            }
        },
        data() {
            return {
                player: {
                    first_name: null,
                    last_name: null,
                    team_id: null
                }
            }
        }
    }
</script>

<style scoped>

</style>