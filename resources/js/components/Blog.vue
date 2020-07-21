<template>
    <div class="container">
        <h1>Blog</h1>
         <div v-for="post in blogPosts" v-key="post.id">
            <h1>{{post.title}}</h1>
            <p>{{post.content}}
            </p>
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
            axios.get('http://laravel-vuejs.com/api/posts')
            .then(response => (this.blogPosts = response.data));
            console.log('Component Blog mounted.')
        }
    }
</script>