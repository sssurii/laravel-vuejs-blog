<template>
    <div>
        <h1>{{title}}</h1>
        <p>{{content}}</p>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                title: 'Hello World!',
                content: 'Welcome to Laravel + Vue.js Blog'
            }
        },
        mounted() {
            console.log('Component Hello World mounted.')
        }
    }
</script>