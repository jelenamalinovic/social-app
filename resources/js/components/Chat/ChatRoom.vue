<template>

    <div class="chat-box">
        <h3>Messenger</h3>
        <div class="chat-heading">
            <h4>Messages</h4>
        </div>
        <div class="content" id="content">
            <chat-messages :messages="messages"></chat-messages>
        </div>
        <div class="footer">
            <chat-form
                v-on:messagesent="addMessage"
                :user="user"
            ></chat-form>
        </div>
    </div>

</template>

<script>

    import axios from 'axios'

    export default {
        name: "chat-room",
        props: ['user'],
        data() {
            return {
                messages: []
            };
        },

        created() {
            this.fetchMessages();

            Echo.private('chat')
                .listen('MessageSent', (e) => {

                    console.log('listen ', e)

                    this.messages.push({
                        message: e.message.message,
                        user: e.user
                    });
                });
        },

        methods: {
            fetchMessages() {
                axios.get('/messages').then(response => {
                    this.messages = response.data;
                });
            },
            addMessage(message) {
                this.messages.push(message);

                axios.post('/messages', message).then(response => {});
                this.updateScroll();

            },
            updateScroll() {
                let element = document.getElementById("content");
                element.scrollTop = element.scrollHeight;
            }
        }
    }
</script>

<style scoped>

    .chat-box {
        width:  70vw;
        margin: 1em auto;
        padding: 2em 1em 1.5em 1em;
        background: #FFFFFF;
        box-shadow: 0 0 0.5em rgba(0, 0, 0, 0.22);
        -moz-box-shadow: 0 0 0.5em rgba(0, 0, 0, 0.22);
        -webkit-box-shadow:  0 0 0.5em rgba(0, 0, 0, 0.22);
        overflow: hidden;

    }

    .chat-box .content {
        overflow-y: auto;
        height: calc(100vh - 23em);
        box-shadow: 0 0 0.5em rgba(0, 0, 0, 0.22);
        -moz-box-shadow: 0 0 0.5em rgba(0, 0, 0, 0.22);
        -webkit-box-shadow:  0 0 0.5em rgba(0, 0, 0, 0.22);

    }

    .chat-box h3 {
        margin-bottom: 1.3em;
    }

    .chat-heading h4 {
        background: #e6e6e6;
        color: rgba(0, 0, 0, 0.9);
        font-weight: 100;
        padding: 0.7em;
        margin-bottom: 0;
        box-shadow: 0 0 0.3em rgba(0, 0, 0, 0.33);
        -moz-box-shadow: 0 0 0.3em rgba(0, 0, 0, 0.33);
        -webkit-box-shadow:  0 0 0.3em rgba(0, 0, 0, 0.33);
    }
    .chat-box .footer {
        margin-top: 2em;
    }

</style>
