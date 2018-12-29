<template>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Create Team</div>
            <div class="panel-body">
                <form  @submit.prevent="save">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" v-model="team.name">
                    </div>

                    <button type="submit" class="btn btn-default">Save</button>
                    <router-link class="btn" to="/teams">Back to all teams</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TeamCreate",
        methods: {
            save() {
                axios.post('/api/teams', this.team)
                    .then((response) => {
                        this.$router.push('/teams')
                    });
            }
        },
        data() {
            return {
                team: {
                    name: null
                }
            }
        }
    }
</script>

<style scoped>

</style>