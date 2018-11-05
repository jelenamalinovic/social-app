
<template>
<div>

    <create :user_id="user_id"></create>
    <read :user_id="user_id"></read>

</div>
</template>


<script>


    export default {
        name: 'profile',
        props: {
            user_id: {
                type: Number,
                required: true
            }
        },
        data() {
            return {
                errors: [],
                attachments: [],
                title: '',
                text: '',
                data: {},
                posts: {}
            };
        },
        mounted() {


        },
        methods: {

        }
    };
</script>


<style scoped>



</style>

