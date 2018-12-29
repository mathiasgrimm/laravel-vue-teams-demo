<template>
    <div class="container" v-if="error">
        <div class="alert alert-danger" role="alert" v-html="error"></div>
    </div>
</template>

<script>
    export default {
        name: "Error",
        computed: {
            error() {
                return this.$store.getters.error;
            }
        }
    }
</script>

<style scoped>

</style>