<template>
    <div>
      <comment v-for="comment in comments" v-bind:comment="comment" v-bind:collection="collection" v-bind:key=comment.id></comment>
    </div>
</template>
<script>
    export default{
        props: ['collection','comments'],
        computed: {
        },
        beforeCreate: function () {
            this.$options.components.Comment = require('./Comment.vue')
        }
    }
</script>
