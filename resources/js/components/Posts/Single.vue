<template>
    <div class="post-box">

        <div class="row title">
            {{post.title}}
        </div>
        <div class="row details">
            Posted by {{user.name}} at {{post.created_at}}
        </div>
        <div class="row thumbnail" v-if="post.image">
            <img class="post-image" :src="`/uploads/posts/${post.image}`" alt="" />
        </div>
        <div class="row text">
            {{post.text}}
        </div>

        <comments :post_id="post.id" :user_name="user.name"></comments>

    </div>
</template>

<script>
    export default {
        name: "single",
        props: {
            post: {
                type: Object,
                required: true
            },
            user: {
                type: Object,
                required: true
            },
        }
    }
</script>

<style scoped>

    img { width: 100%; }

    .post-box {
        width: 53vw;
    }

    .post-box .details,
    .post-box .title,
    /*.post-box .thumbnail,*/
    .post-box .text {
        margin-top: 1em;
    }

    .post-box .title {
        font-size: xx-large;
        font-weight: bold;
    }

    .post-box .thumbnail {

        margin: 1em 1em 0 0;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        height: 30em;
    }

</style>
