<script setup>
import {onMounted, ref, onUpdated} from "vue";
import axios from "axios";
import Messages from "./Messages.vue";
import {PaperAirplaneIcon} from "@heroicons/vue/16/solid/index.js";

const sentMessages = ref([]);
const messageInput = ref("");

var pusher = new Pusher('d32f9b0ea3e5bd4c67d9', {
    cluster: 'ap3'
});

onMounted(() => {
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        sentMessages.value.push(data.message)
    });
});

function sendMessage() {
    if (messageInput.value) {
        axios.post('/button', {
            message: messageInput.value
        }, {
            headers: {
                'X-Socket-Id': pusher.connection.socket_id
            }
        }).then(() => {
            sentMessages.value.push({
                message: messageInput.value,
                me: true
            })
            messageInput.value = "";
        });
    }
}

const bottomRef = ref(null);

onUpdated(() => {
    bottomRef.value.scrollIntoView({ behavior: 'smooth' });
});

</script>

<template>
    <div class="flex h-5/6">
        <div class="flex-initial w-full flex flex-col justify-center items-center">
            <div class="flex flex-col flex-grow w-full max-w-xl bg-gray-800 shadow-xl rounded-l-lg  overflow-hidden">
                <div class="flex flex-col flex-grow h-10 p-4 overflow-auto">
                        <Messages :messages="sentMessages"></Messages>
                        <div ref="bottomRef"></div>
                </div>
            </div>
        </div>

        <div class="flex h-full">
            <form @submit.prevent class="flex">
                <div class="flex-none w-24 flex flex-col bg-gray-800 p-4 border border-gray-700 rounded-r-lg">
                    <input
                        v-model="messageInput"
                        id="inputMessage"
                        class="basis-11/12 flex items-center h-10 rounded-xl px-3 text-sm bg-gray-800 text-white p-3 border border-gray-700 hover:border-sky-400"
                        type="text"
                        placeholder="ᠶᠤᠮ ᠪᠢᠴᠢᠭᠡᠷᠡᠢ"
                    >
                    <button
                        @click="sendMessage"
                        type="submit"
                        class="basis-1/12 mt-1 rounded-xl text-white hover:text-sky-500"
                    >
                        <PaperAirplaneIcon></PaperAirplaneIcon>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
#inputMessage {
    float: right;
    clear: both;
    overflow: auto;
    font-size: 25px;
    -moz-writing-mode: vertical-lr;
    writing-mode: vertical-lr;
    -webkit-writing-mode: vertical-lr;
    -o-writing-mode: vertical-lr;
    -ms-writing-mode: tb-lr;
    writing-mode: tb-lr;
    -webkit-text-orientation: sideways-right;
}
*:focus {
    outline: none;
}
</style>
