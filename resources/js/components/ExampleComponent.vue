<template>

<div>
<HomeApp/>
<router-view></router-view>
</div>
</template>

<script>
import HomeApp from"./home.vue"
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components:{
            HomeApp
        }
    }
</script>
<style scoped>
</style>
