<template>
    <div class="container">
        <h1>Blog</h1>
        <blog-post v-for="post in blogPosts" v-bind:post="post" v-bind:key="post.id"></blog-post>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                blogPosts: null
            }
        },
        mounted() {
            axios.get('http://laravel-vuejs.com/api/posts')
            .then(response => (this.blogPosts = response.data));
            console.log('Component Blog mounted.')
        }
    }
</script>