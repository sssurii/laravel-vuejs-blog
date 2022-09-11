<template>
    <div class="max-w-3xl mx-auto pb-28">
        <article class="relative pt-10">
            <h1 class="text-2xl font-extrabold tracking-tight text-slate-900 dark:text-slate-200 md:text-3xl ">{{postObj.title}}</h1>
            <div class="mt-12 prose prose-slate dark:prose-dark">
                <p>{{postObj.content}} </p>
                </div>           
        </article>
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
        mounted() {
            let post_id = this.$route.params.id;
            this.getPost(post_id);
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