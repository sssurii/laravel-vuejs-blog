<template>
    <div class="links m-t-md m-b-md">
        <router-link v-for="link in links" v-if="link.link" :to="link.link" :key="link.title">{{link.title}}</router-link>
        <router-link v-if="!isLoggedIn" :to="`/register`" >Register</router-link>
        <a v-if="isLoggedIn" @click="handleLogout">Logout</a>
        <router-link v-else :to="`/login`" >Login</router-link>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                isLoggedIn: localStorage.getItem('isLoggedIn'),
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
                    // },
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
                        this.$router.push('/login');
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        mounted() {
            setTimeout(() => {
                this.isLoggedIn = localStorage.getItem('isLoggedIn');
            }, 1000);
            console.log('navbar loaded')
        }
    }
</script>