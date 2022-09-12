<template>
    <div class="max-w-lg mx-auto">
        <div v-if="message">
            <div v-if="success" class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    {{message}}
                </div>
            </div>
            <div v-else class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    {{message}}
                </div>
            </div>
        </div>
        <div v-if="errors" class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
            <ul>
                <li v-for="error in errors">{{ error }}</li>
            </ul>
        </div>
        <form @submit.prevent="createPost" class="border border-radius-2 mb-2 p-4">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">Title</label>
                    <input type="text" name="title" id="title" class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none" v-model="post_data.title" required>
                </div>
                <div class="w-full md:w-full px-3 mb-6">
                    <label for="editor" class="sr-only">Content</label>
                    <textarea name="content" id="editor" rows="8" class="block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none" placeholder="Write an article..." v-model="post_data.content" required></textarea>
                </div>
                <div class="w-full px-3 mb-6">
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800"> Publish post </button>
                    <button type="reset" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-orange-700 rounded-lg focus:ring-4 focus:ring-orange-200 dark:focus:ring-orange-900 hover:bg-orange-800"> Cancel </button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            post_data: {
                title: null,
                content: null
            },
            message: null,
            success: false,
            errors: null
        }
    },
    mounted() {
        this.post_data = {
            title: null,
            content: null
        }
    },
    methods: {
        createPost: function(e) {
            e.preventDefault();
            axios.post('/api/post/create', this.post_data)
                .then((response) => {
                    console.log(response);
                    this.post_data = {
                        title: null,
                        content: null
                    }
                    this.success = true;
                    this.message = 'Post created successfully!';
                })
                .catch(function(error) {
                    console.log(error);
                    this.success = false;
                    this.message = error
                });
        }
    }
}

</script>
