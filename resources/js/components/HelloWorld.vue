<template>
    <div>
        <h1>{{customTitle}}</h1>
        <p>{{content}}</p>
        <input placeholder="Enter your name" type="text" v-model="name" v-on:change="showName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        <p>You are writing : {{name}}</p>
    </div>
</template>
<script>
    export default {
        props: ['title', 'content'],
        data () {
            return {
                name: '',
                content: ''
            }
        },
        mounted() {
            console.log('Component Hello World mounted.')
        },
        computed:{
            customTitle: function () {
                return (this.name == '') ? this.title : (this.title || "").split(' ')[0] + ` ${this.name}!`;
            }
        },
        methods: {
            showName () {
                return this.customTitle;
            }
        }
    }
</script>