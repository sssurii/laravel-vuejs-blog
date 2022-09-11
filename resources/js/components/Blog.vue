<template>
    <div class="container">
        <h1 class="text-3xl font-bold">Blog</h1>
        <div v-if="blogPosts">
            <!-- It's not recommend to use v-if with v-for. For more detail check :
                https://vuejs.org/v2/style-guide/#Avoid-v-if-with-v-for-essential -->
            <div v-for="post in blogPosts" v-bind:post="post" v-bind:key="post.id">
                <div class="border border-radius-2 mb-2 p-4">
                    <h1 class="text-2xl font-bold mb-2">{{post.title}}</h1>
                    <p>
                        {{post.content}}
                    </p>
                    <router-link :to="'post/' + post.id" :key="post.title" class="font-bold">Read More ...</router-link>
                </div>
                <hr>
            </div>
        </div>
        <div v-else>
            <p>Sorry! no post available</p>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            blogPosts: null
        }
    },
    mounted() {
        this.getPosts();
        console.log('Component Blog mounted.')
    },
    methods: {
        getPosts: function() {
            axios.get(this.$root.url('api/posts'))
                .then((response) => {
                    this.blogPosts = response.data
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    }
}

</script>
