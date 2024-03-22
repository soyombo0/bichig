<script setup>
import {onMounted, ref} from "vue";
import axios from "axios";


const sentMessages = ref([]);
const receivedMessages = ref([]);
const messageInput = ref("");

var pusher = new Pusher('d32f9b0ea3e5bd4c67d9', {
    cluster: 'ap3'
});

onMounted(() => {
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        receivedMessages.value.push(data.message)
    });
});

function sendMessage() {
    axios.post('/button', {
        message: messageInput.value
    }, {
        headers: {
            'X-Socket-Id': pusher.connection.socket_id
        }
    }).then(() => {
        sentMessages.value.push(messageInput.value)
        messageInput.value = "";
    })
}

</script>

<template>
    <div class="flex">
        <div class="flex-initial w-96 flex flex-col justify-center items-center min-h-dvh">
            <div class="flex flex-col flex-grow w-full max-w-xl bg-gray-800 shadow-xl rounded-l-lg  overflow-hidden">
                <div class="flex flex-col flex-grow h-10 p-4 overflow-auto">
                    <div class="flex w-full mt-2 space-x-3 max-w-xs">
                            <ul class="">
                                <li id="rMessage"
                                    class="mt-2 text-sm text-white bg-gray-700 p-3 rounded-r-lg rounded-bl-lg"
                                    v-for="(receivedMessage, rIndex) in receivedMessages"
                                    :key="rIndex"
                                >
                                    {{ receivedMessage }}
                                </li>
                            </ul>
                    </div>
                    <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                        <div>
                            <ul>
                                <li id="inputMessage"
                                    class="mt-2 text-sm bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg"
                                    v-for="(message, index) in sentMessages"
                                    :key="index"
                                >
                                        {{ message }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                class="basis-1/12 mt-6 rounded-xl bg-gray-600 text-white shadow hover:bg-sky-400"
            >
                Send
            </button>
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
#rMessage {
    float: left;
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
