<template>
    <div>
         <h1>{{post.title}}</h1>
         <p>{{post.content}}</p>
    </div>
</template>
<script>
    export default {
        props: ['post'],
        mounted() {
            console.log('Component Blog Post mounted.')
        }
    }
</script>