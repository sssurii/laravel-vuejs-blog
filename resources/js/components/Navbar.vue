<template>
    <div class="links">
        <a v-for="link in links" v-if="link.link" v-bind:href="link.link">{{link.title}}</a>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                links: [
                    {
                    'title' : 'Docs',
                    'link' : 'https://laravel.com/docs'
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
                        'title' : 'Blog',
                        'link' : '/blog'
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
                    },
                    {
                        'title' : 'Signup',
                        'link' : '/register'
                    }
                ]
            }
        },
        mounted() {
            console.log('navbar loaded')
        }
    }
</script>