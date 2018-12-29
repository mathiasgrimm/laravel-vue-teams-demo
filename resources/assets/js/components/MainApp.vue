<template>
    <div id="main">
        <Header/>
        <div class="content">
            <Error />
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import Header from './Header';
    import Error from './Error';

    export default {
        name: 'main-app',
        components: {Header, Error}
    }
</script>
