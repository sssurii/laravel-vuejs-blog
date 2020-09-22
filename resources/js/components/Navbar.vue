<template>
    <div class="links m-t-md m-b-md">
        <router-link v-for="link in links" v-if="link.link" :to="link.link" :key="link.title">{{link.title}}</router-link>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                links: [
                    {
                        'title' : 'Home',
                        'link' : '/'
                    },
                    {
                    'title' : 'Hello World',
                    'link' : '/hello-world'
                    },
                    {
                        'title' : 'Signup',
                        'link' : '/register'
                    },
                    {
                        'title' : 'Laracasts',
                        'link' : 'https://laracasts.com'
                    },
                    {
                        'title' : 'News',
                        'link' : 'https://laravel-news.com'
                    },
                    {
                        'title' : 'Nova',
                        'link' : ''
                    },
                    {
                        'title' : 'Forge',
                        'link' : ''
                    },
                    {
                        'title' : 'Vapor',
                        'link' : ''
                    },
                    {
                        'title' : 'GitHub',
                        'link' : 'https://github.com/sssurii/laravel-vuejs-blog'
                    }
                ]
            }
        },
        mounted() {
            console.log('navbar loaded')
        }
    }
</script>