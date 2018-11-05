
require('./bootstrap');

import Vue          from 'vue'

Vue.component('profile', require('./components/Profile.vue'));
Vue.component('single', require('./components/Posts/Single.vue'));
Vue.component('create', require('./components/Posts/Create.vue'));
Vue.component('read', require('./components/Posts/Read.vue'));
Vue.component('comments', require('./components/Posts/Comments.vue'));

Vue.component('chat-room', require('./components/Chat/ChatRoom.vue'));
Vue.component('chat-messages', require('./components/Chat/ChatMessages.vue'));
Vue.component('chat-form', require('./components/Chat/ChatForm.vue'));

export const eventBus = new Vue();

const app = new Vue({
    el: '#app',
});
