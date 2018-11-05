<template>

   <div class="chat-input-box row justify-content-center">

       <i class="material-icons">send</i>

       <input type="text"
              v-model="newMessage"
              @keyup.enter="sendMessage"
              placeholder="Type your message here..."/>

       <a href="#" @click="sendMessage">SEND</a>

   </div>

</template>

<script>
    export default {
        name: 'chat-form',
        props: ['user'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                });

                this.newMessage = ''
            }
        }    
    }
</script>

<style>

    .chat-input-box input[type='text']
    {
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        display: inline-block;
        width: 60%;
        border: none;
        border-bottom: 1px solid #ddd;
        background: transparent;
        margin: -0.5em 1.2em 0 1.2em;
    }

    .chat-input-box a {
        text-decoration: none;
        font-size: medium;
        font-weight: bold;
    }

</style>
