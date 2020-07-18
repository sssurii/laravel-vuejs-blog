<template>
    <div>
        <h1>{{title}}</h1>
        <p>{{content}}</p>
        <input placeholder="Enter your name" type="text" v-model="name" v-on:change="showName">
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
        },
        methods: {
            showName () {
                let title = this.title.split(' ');
                this.title = title[0] + ' ' + this.name + '!';
            }
        }
    }
</script>