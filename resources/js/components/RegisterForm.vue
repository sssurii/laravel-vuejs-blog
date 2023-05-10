<template>
    <div class="row flex-column">
        <div class="col-md-4 offset-md-4">
            <div v-if="message">
                <div v-if="success" class="alert alert-success" role="alert">
                  {{message}}
                </div>
                <div v-else class="alert alert-danger" role="alert">
                  {{message}}
                </div>
            </div>
            <div v-if="errors" class="alert alert-danger">
                <ul>
                    <li v-for="error in errors">{{ error }}</li>
                </ul>
            </div>

            <form class="form-signup form mb-3" method="post" v-bind:action="url('/register')">
                <h1 class="h3 mb-3 font-weight-normal">Register</h1>
                <div class="form-group mb-3">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" required="" autofocus="">
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="sr-only">Email address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="" >
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            </form>
            <a v-bind:href="url('/login')">Login</a>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                success: false,
                message: null,
                hasErrors: false,
                errors: null,
            };
        },
        methods: {
            url: (link) => window.location.origin + link, 
            route: (link) => window.location.origin + link
        },
        mounted() {
            console.log('Component Register Form mounted.')
        }
    }
</script>