<template>
    <div>
        <h1 class="text-2xl font-bold">{{postObj.title}}</h1>
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
                this.getPost(post_id);
            } else {
                this.postObj = this.post;
            }
        },
        mounted() {
            console.log('Component Blog Post mounted.')
        },
        methods: {
            getPost: function(post_id) {
                axios.get(this.$root.url('api/post') + '/' + post_id)
                .then((response) => {
                    this.postObj = response.data
                })
                .catch(function(error) {
                    console.log(error);
                });
            }
        }
    }
</script>