<template>
    <div>
        <h1>{{postObj.title}}</h1>
        <p>{{postObj.content}}
            <router-link v-if="showReadMore" :to="'post/' + post.id" :key="post.title">Read More ...</router-link>
        </p>
    </div>
</template>
<script>
    export default {
        props: ['post'],
        data() {
            return {
                showReadMore: true,
                postObj: {
                    title:'',
                    content:''
                }
            }
        },
        beforeMount() {
            if(this.post == undefined) {
                this.showReadMore = false;
                let post_id = this.$route.params.id;
                axios.get('http://blog.laravel-vuejs.com/api/post'+ '/' + post_id)
                .then(response => (this.postObj = response.data));
            } else {
                this.postObj = this.post;
            }
        },
        mounted() {
            console.log('Component Blog Post mounted.')
        }
    }
</script>