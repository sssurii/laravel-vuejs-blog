<template>
	<form>
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
	       		<button @click="createPost()" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800"> Publish post </button>
	       		<button type="reset" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-orange-700 rounded-lg focus:ring-4 focus:ring-orange-200 dark:focus:ring-orange-900 hover:bg-orange-800"> Cancel </button>
	        </div>
	    </div>
	</form>
</template>
<script>
    export default {
        data() {
            return {
            	post_data : {
	            		title: null,
	            		content: null
            		}
            	}
            },
            mounted () {
            	this.post_data = {
	            		title:null,
	            		content:null
            		}
            },
            methods: {
            	createPost: function (e) {
            		e.preventDefault();
            		axios.post('/api/post/create', this.post_data)
            		.then((response) => {
            			console.log(response);
            		})
            		.catch(function (error) {
            			console.log(error);
            		});
            	}
            }
        }
</script>