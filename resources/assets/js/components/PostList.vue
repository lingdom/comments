<template>
    <div>
        <div class="comment-wrap"  v-for="post in posts">
            <div class="photo">
                <div class="avatar" style="background-image: url('https://ssl.gstatic.com/accounts/ui/avatar_2x.png')">
                </div>
            </div>
            <div class="comment-block">
                <div class="comment-text">
                   <b>{{ post.username }} : </b>
                   <p>{{ post.content }}</p>
                </div>
                <div class="bottom-comment">  
                <ul class="comment-actions">
                    <li class="reply"  @click="replyToPost = replyToPost? false:post">Reply</li>
                </ul>
                <post-form v-if="replyToPost == post" :post="post"></post-form>
                </div>
            <div>
            <comment-list v-if="post.comments" :collection="post.comments" :comments="post.comments.root"></comment-list>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import CommentList from './CommentList.vue';
    import PostForm from './PostForm.vue';
    export default {
        data() {
            return { 
                replyToPost: false
            }
        },
        components: {
            'comment-list': CommentList,
            'post-form': PostForm
        },
        computed: {
            posts(){
                return this.$store.state.posts;
            }
        },
        mounted(){
            this.getPosts();
        },
        methods: {
            getPosts(){
                axios.get('post').then(response => {
                    if(!response.data.error){
                        response.data.data.forEach((post) => {
                            this.$store.commit('pushPost',post);
                        });
                    }
                });
            }
        }
    }
</script>
