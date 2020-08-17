<template>
    <div class="container">
        <h1>Blog</h1>
        <div v-if="blogPosts"> 
            <!-- It's not recommend to use v-if with v-for. For more detail check :
                https://vuejs.org/v2/style-guide/#Avoid-v-if-with-v-for-essential -->
            <blog-post v-for="post in blogPosts" v-bind:post="post" v-bind:key="post.id"></blog-post>
        </div>
        <div v-else>
            <p>Sorry! no post available</p>
        </div>
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
            axios.get('http://blog.laravel-vuejs.com/api/posts')
            .then(response => (this.blogPosts = response.data));
            console.log('Component Blog mounted.')
        }
    }
</script>