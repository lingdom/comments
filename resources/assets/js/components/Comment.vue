<template>
    <div class="sublist">
        <div class="photo">
            <div class="avatar" style="background-image: url('https://ssl.gstatic.com/accounts/ui/avatar_2x.png')"></div>
        </div>
        <div class="comment-block">
            <b>{{ comment.username }}</b> :
            <p>{{ comment.content }}</p>
            <div class="bottom-comment">
                <ul class="comment-actions">
                    <li class="reply" v-if="!comment.parent_id" @click="replyToComment = replyToComment? false:comment">Reply</li>
                </ul>
            </div>
            <comment-form v-if="replyToComment == comment" :comment="comment"></comment-form>
            <comment-list v-if="collection[comment.id]" v-bind:comments="collection[comment.id]" v-bind:collection="collection"></comment-list>
        </div>
    </div>
</template>
<script>
    import CommentList from './CommentList.vue';
    import CommentForm from './CommentForm.vue';
    export default {
        props: ['comment', 'collection'],
        data() {
            return {
                replyToComment: false
            }
        },
        mounted() {
        },
        components: {
            'comment-list': CommentList,
            'comment-form': CommentForm
        }
    }
</script>
