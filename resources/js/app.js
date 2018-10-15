
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));

const app = new Vue({
    el: '#app',
    data: {
        messages: []
    },
    methods: {
        addMessage(message){
            //añadir mensaje al chat
            this.messages.push(message);

            //guardar en la bd
            axios.post('/softskills/public/mensajes', message).then(response => {
                console.log('guardar');
            });
        }
    },
    created(){
        //al iniciar, toma los valores de un json de la bd de mensajes guardados
        axios.get('/softskills/public/mensajes').then(response => {
            console.log('leer');
            this.messages = response.data;
        });

        Echo.join('chatroom')
            .here((users) => {
                //
            })
            .joining((user) => {
                console.log(user.name);
            })
            .leaving((user) => {
                console.log(user.name);
            })
            .listen('MessagePosted',(e) => {
                console.log(e);
            });
    }
});
