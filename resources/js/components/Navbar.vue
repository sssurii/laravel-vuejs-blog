<template>
    <div class="links">
        <a v-for="link in links" v-bind:href="link.link">{{link.title}}</a>
    </div>
</template>
<script>
    export default {
        props : ['links'],
        mounted() {
            console.log('navbar loaded')
        }
    }
</script>