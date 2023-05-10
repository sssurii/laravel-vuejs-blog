<template>
    <div class="container">
        <div class="d-flex align-items-center justify-content-center justify-content- mb-3">
            <h1 class="text-3xl font-bold col-10">Blog</h1>
            <router-link to="/post/create" class="btn btn-primary btn-sm col-2 ">Create Post</router-link>
        </div>
        <div v-if="blogPosts">
            <!-- It's not recommend to use v-if with v-for. For more detail check :
                https://vuejs.org/v2/style-guide/#Avoid-v-if-with-v-for-essential -->
            <div v-for="post in blogPosts" v-bind:key="post.id">
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
//import { Router } from 'express';

export default {
    data() {
        return {
            blogPosts: null
        };
    },
    mounted() {
        this.getPosts();
        console.log("Component Blog mounted.");
    },
    methods: {
        getPosts: function () {
            axios.get(this.$root.url("api/posts"))
                .then((response) => {
                this.blogPosts = response.data;
            })
                .catch(function (error) {
                console.log(error);
            });
        }
    },
    //components: { Router }
}

</script>
