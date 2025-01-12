<script setup>
import {Link, useForm, usePage} from "@inertiajs/vue3";
import {computed} from "vue";
import axios from "axios";

let form = useForm({
    email: '',
    password: ''
});
const props = defineProps({
    chats: Array
});
const user = computed(() => page.props.auth.user);
// console.log()
function createChat() {
    axios.post('/chats', {
        firstUser: user.value,
        secondUser: user.value
    }, {
        headers: {
            'Content-Type': 'application/json'
        }
    })
}

const page = usePage()
const error = computed(() => page.props.errors);
</script>

<template>
    <div class="flex flex-col mt-20 bg-gray-800 bg-opacity-70 p-12 rounded-lg shadow text-white">
        <button @click="createChat" class="p-2 px-12 text-white bg-sky-500 rounded-2xl hover:bg-sky-700" type="submit">Create chat</button>
        <div class="1.5 border-b-2">Chats</div>
        <Link :href="`/chats/${chat.id}`" v-for="chat in props.chats" class="flex py-2 p-3 my-1 gap-4 border-gray-500 border hover:bg-gray-700 rounded-lg">
            <p>Chat:</p>
            <p>{{chat.users[0].name}}</p>
        </Link>
    </div>
</template>

<style scoped>

</style>
