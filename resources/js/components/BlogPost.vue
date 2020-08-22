<template>
    <div>
         <h1>{{post.title}}</h1>
         <p>{{post.content}}</p>
         <router-link v-if="showReadMore" :to="'post/' + post.id" :key="post.title">Read More ...</router-link>
    </div>
</template>
<script>
    export default {
        props: ['post'],
        data() {
            return {
                showReadMore: true,
            }
        },
        beforeMount() {
            if(this.post == undefined) {
                this.showReadMore = false;
                let post_id = this.$route.params.id;
                axios.get('http://blog.laravel-vuejs.com/api/post'+ '/' + post_id)
                .then(response => (this.post = response.data));
            }
        },
        mounted() {
            console.log('Component Blog Post mounted.')
        }
    }
</script>