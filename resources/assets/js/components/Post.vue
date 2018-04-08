<template>
	<div class="comment-wrap">
		<div class="photo">
			<div class="avatar" style="background-image: url('https://ssl.gstatic.com/accounts/ui/avatar_2x.png')"></div>
		</div>
		<div class="comment-block" v-bind:class='[ errors.hasOwnProperty("content") ? "has-error" : "" ]'>	
			<input class="add-new" type="text" placeholder="Your name" v-model="post.username">
			<span v-if='[errors.hasOwnProperty("username")]' v-for="error in errors.username">{{ error }}</span>
			<textarea v-model="post.content" class="add-new" placeholder="leave a comment..." v-on:keyup.enter="createPost()"></textarea>
			<span v-if='[errors.hasOwnProperty("content")]' v-for="error in errors.content">{{ error }}</span>
		</div>
			</div>
	</div>
</template>

<script>
	export default {
	        data() {
	            return {
	                post: {
	                	username: '',
	                	content: ''
	                },
	                errors: []
	            }
	        },
	        methods: {
	            createPost() {
	            
		            axios.post('post',this.post).then(response => {
	                    if(!response.data.error) {
	                    	this.post.content = '';
	                    	this.errors = [],
	                        this.$store.commit('pushPost',response.data.data);
	                    } else{
	                        this.errors = response.data.data;
	                    }
	                });
	            }
	        }
	}
</script>
