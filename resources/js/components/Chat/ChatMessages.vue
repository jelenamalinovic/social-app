<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{ message.user.name }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    name: 'chat-messages',
    props: ['messages'],
};
</script>

<style scoped>

    .chat {
        list-style: none;
        margin-left: -2em;
    }

    .chat .chat-body {
        padding: 1em 0.5em 0 0.5em;
    }

</style>
