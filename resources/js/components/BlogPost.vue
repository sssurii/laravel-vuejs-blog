<template>
    <div>
         <h1>{{post.title}}</h1>
         <p>{{post.content}}</p>
    </div>
</template>
<script>
    export default {
        props: ['post'],
        beforeMount() {
            if(this.post == undefined) {
                let post_id = this.$route.params.id;
                axios.get('http://blog.laravel-vuejs.com/api/post'+ '/' + post_id)
                .then(response => (this.postObj = response.data));
            }
        },
        mounted() {
            console.log('Component Blog Post mounted.')
        }
    }
</script>