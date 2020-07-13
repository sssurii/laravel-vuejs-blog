<template>
    <div class="links">
        <a v-for="link in links" v-bind:href="link.link">{{link.title}}</a>
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
                        'link' : 'https://blog.laravel.com'
                    },
                    {
                        'title' : 'Nova',
                        'link' : 'https://nova.laravel.com'
                    },
                    {
                        'title' : 'Forge',
                        'link' : 'https://forge.laravel.com'
                    },
                    {
                        'title' : 'Vapor',
                        'link' : 'https://vapor.laravel.com'
                    },
                    {
                        'title' : 'GitHub',
                        'link' : 'https://github.com/laravel/laravel'
                    }
                ]
            }
        },
        mounted() {
            console.log('navbar loaded')
        }
    }
</script>