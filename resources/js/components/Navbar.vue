<template>
    <div class="links m-t-md m-b-md">
        <router-link v-for="link in links" v-if="link.link" :to="link.link" :key="link.title">{{link.title}}</router-link>
        <router-link v-if="!isLoggedIn" :to="`/register`" >Register</router-link>
        <router-link v-if="!isLoggedIn" :to="`/login`" >Login</router-link>
        <a class="" href="#" v-if="isLoggedIn" @click="handleLogout">Logout</a>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                isLoggedIn: localStorage.getItem('isLoggedIn') == 'true',
                links: [
                    {
                        'title' : 'Home',
                        'link' : '/'
                    },
                    {
                    'title' : 'Hello World',
                    'link' : '/hello-world'
                    },
                    // {
                    //     'title' : 'Signup',
                    //     'link' : '/register'
                    // }
                    // {
                    //     'title' : 'Laracasts',
                    //     'link' : 'https://laracasts.com'
                    // },
                    // {
                    //     'title' : 'News',
                    //     'link' : 'https://laravel-news.com'
                    // },
                    // {
                    //     'title' : 'Nova',
                    //     'link' : ''
                    // },
                    // {
                    //     'title' : 'Forge',
                    //     'link' : ''
                    // },localStorage.setItem('isLoggedIn', false);
                    // {
                    //     'title' : 'Vapor',
                    //     'link' : ''
                    // },
                    // {
                    //     'title' : 'GitHub',
                    //     'link' : 'https://github.com/sssurii/laravel-vuejs-blog'
                    // }
                ]
            }
        },
        methods: {
            handleLogout: (e) => {
                e.preventDefault();
                axios.post(window.location.origin + "/api/logout", '', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        'Content-Type': 'application/json'
                        }
                    })
                    .then((response) => {
                        console.log(response.data);
                        app.isLoggedIn = false;
                        localStorage.setItem('isLoggedIn', false);
                        window.location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        mounted() {
            console.log(this.isLoggedIn);
            setTimeout(() => {
                this.isLoggedIn = localStorage.getItem('isLoggedIn') == 'true';
                console.log(this.isLoggedIn);
            }, 1000);
            console.log('navbar loaded')
        }
    }
</script>