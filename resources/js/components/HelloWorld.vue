<template>
    <div>
        <h1>{{customTitle}}</h1>
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
        computed:{
            customTitle: function () {
                return (this.name == '') ? this.title : this.title.split(' ')[0] + ` ${this.name}!`;
            }
        },
        methods: {
            showName () {
                return this.customTitle;
            }
        }
    }
</script>