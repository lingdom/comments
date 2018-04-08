<template>
    <div>
        <input type="text" v-model="username" class="add-new" placeholder="Your name">
        <textarea v-model="content" class="add-new" v-on:keyup.enter="replyTo(comment)" placeholder="leave a comment..."></textarea>
    </div>
</template>
<style>
</style>
<script>
    export default {
        props: ['comment'],
        data() {
            return {
                username: '',
                content: '',
            }
        },
        methods: {
            replyTo(comment) {
                axios.post('comment', {username: this.username, content: this.content, post_id: comment.post_id, parent_id: comment.id}).then(response => {        
                   
                   if (!response.data.error) {
                    this.content = '';
                    let payLoad = {
                        post_id: comment.post_id,
                        comments: response.data.data
                    };
                    this.$store.commit('updateComments',payLoad);
                    } else {
                        this.errors = response.data.data;
                    }
            });
            }
        }
    }
</script>
