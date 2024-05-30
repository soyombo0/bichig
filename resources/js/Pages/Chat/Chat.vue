<script setup>
import {onMounted, ref, onUpdated} from "vue";
import axios from "axios";
import Messages from "./Messages.vue";
import {PaperAirplaneIcon} from "@heroicons/vue/16/solid/index.js";

const sentMessages = ref([]);
const messageInput = ref("");

var pusher = new Pusher('435d347977604717dd0d', {
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
    <div class="chat-box flex w-full max-w-xl bg-gray-800 bg-opacity-70 shadow-xl rounded-lg mt-1">
        <div class="w-full flex flex-col justify-center items-center shadow">
            <div class="flex flex-col flex-grow w-full max-w-xl bg-gray-800 bg-opacity-70 shadow-xl rounded-l-lg  overflow-hidden">
                <div class="flex flex-col flex-grow h-10 p-4 overflow-auto">
                        <Messages :messages="sentMessages"></Messages>
                        <div ref="bottomRef"></div>
                </div>
            </div>
        </div>

        <form @submit.prevent class="flex">
            <div class="flex-none text-center w-24 flex flex-col justify-between px-4 py-2 pb-1 rounded-r-lg">
                <input
                    v-model="messageInput"
                    id="inputMessage"
                    class="flex-1 flex items-center h-10 rounded-xl text-sm bg-gray-800 text-white p-3 border border-gray-700"
                    type="text"
                    placeholder="ᠶᠤᠮ ᠪᠢᠴᠢᠭᠡᠷᠡᠢ"
                >
                <button
                    @click="sendMessage"
                    type="submit"
                    class="mt-2 text-gray-700 hover:text-sky-500"
                >
                    <box-icon type='regular' color="#ACA8A8" name='send' size="md" animation="tada-hover"></box-icon>
                </button>
            </div>
        </form>
    </div>
</template>

<style scoped>

.chat-box {
    height: 85vh;
}

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
}
*:focus {
    outline: none;
}
</style>
