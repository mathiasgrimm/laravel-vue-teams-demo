<template>
    <div class="container" v-if="player">
        <div class="panel panel-default">
            <div class="panel-heading">View Player</div>
            <div class="panel-body">
                <form  @submit.prevent="save">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="id" v-model="player.id" disabled>
                    </div>

                    <div class="form-group">
                        <label for="created_at">Created</label>
                        <input type="text" class="form-control" id="created_at" v-model="player.created_at.date" disabled>
                    </div>

                    <div class="form-group">
                        <label for="updated_at">Updated</label>
                        <input type="text" class="form-control" id="updated_at" v-model="player.updated_at.date" disabled>
                    </div>

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
                    <router-link class="btn" to="/players">Back to all players</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PlayerView",
        methods: {
            save() {
                axios.put(`/api/players/${this.$route.params.id}`, this.player)
                    .then((response) => {
                        this.$router.push('/players')
                    });
            }
        },
        mounted() {
            axios.get(`/api/players/${this.$route.params.id}`)
                .then((response) => {
                    this.player = response.data.player
                });
        },
        data() {
            return {
                player: null
            }
        }
    }
</script>

<style scoped>

</style>