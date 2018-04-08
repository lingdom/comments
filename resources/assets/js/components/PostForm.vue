<template>
    <div>
        <input type="text" v-model="username" class="add-new" placeholder="Your name">
        <textarea v-model="content" class="add-new" v-on:keyup.enter="comment(post)" placeholder="leave a comment..."></textarea>
    </div>
</template>
<style>
</style>
<script>
    export default {
        props: ['post'],
        data() {
            return {
                username: '',
                content: '',
            }
        },
        methods:{
             comment(post) {
                axios.post('comment', {username: this.username, content: this.content, post_id: post.id}).then(response => {
                    if (!response.data.error) {
                        this.content = '';
                        let payLoad = {
                            post_id: post.id,
                            comments: response.data.data,
                        };
                        this.$store.commit('updateComments',payLoad);
                    }
                });
            }
        }
    }
</script>
