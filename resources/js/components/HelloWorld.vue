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
                name: '',
                customTitle: this.title
            }
        },
        mounted() {
            console.log('Component Hello World mounted.')
        },
        methods: {
            showName () {
                //Use of data property instead of mutating a prop directly since the value will be overwritten whenever the parent component re-renders. Instead, use a data or computed property based on the prop's value.
                this.customTitle = this.title;
                if (this.name != '') {
                    let title = this.title.split(' ');
                    this.customTitle = title[0] + ' ' + this.name + '!';
                }
            }
        }
    }
</script>