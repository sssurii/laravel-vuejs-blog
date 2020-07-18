<template>
    <div>
        <h1>{{title}}</h1>
        <p>{{content}}</p>
        <input type="text" v-model="name">
        <p>You are writing : {{name}}</p>
    </div>
</template>
<script>
    export default {
        props: ['title', 'content'],
        data () {
            return {
                name: ''
            }
        },
        mounted() {
            console.log('Component Hello World mounted.')
        }
    }
</script>