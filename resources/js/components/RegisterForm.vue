<template>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            @if(isset($message))
                @if(isset($success) && $success)
                    <div class="alert alert-success" role="alert">
                      {{$message}}
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div>
                @endif
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form-signup form" method="post" action="{{url('/register')}}">
                @csrf
                <h1 class="h3 mb-3 font-weight-normal">Register</h1>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" required="" autofocus="">
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="" >
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            </form>
            @if (Route::has('login'))
                <a href="{{ route('login') }}">Login</a>
            @endif
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            console.log('Component Register Form mounted.')
        }
    }
</script>