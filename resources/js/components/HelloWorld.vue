<template>
    <div>
        <h1>{{title}}</h1>
        <p>{{content}}</p>
    </div>
</template>
<script>
    export default {
        mounted() {
            console.log('Component Hello World mounted.')
        }
    }
</script>