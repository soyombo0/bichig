<script setup>
import {onMounted, ref, onUpdated} from "vue";
import axios from "axios";

const username = ref("");
const email = ref("");
const password = ref("");


async function signup() {
    axios.post("/auth/signup", {
        name: username.value,
        email: email.value,
        password: password.value
    }).then(() => {
        console.log('success')
    })
}
</script>

<template>
    <div class="m-auto text-center bg-gray-800 bg-opacity-70 p-12 rounded-lg block shadow">
        <h1 class="text-white text-5xl"></h1>
        <form @submit.prevent>
            <div class="grid gap-4">
                <input class="rounded-lg text-sm bg-gray-800 text-white p-3 border border-gray-700" v-model="email" name="email" type="email" placeholder="Enter email">
                <input class="rounded-lg text-sm bg-gray-800 text-white p-3 border border-gray-700" v-model="username" name="username" type="text" placeholder="Enter username">
                <input class="rounded-lg text-sm bg-gray-800 text-white p-3 border border-gray-700" v-model="password" name="password" type="password" placeholder="Enter password">
            </div>
            <button @click="signup" class="p-2 text-white m-7 bg-sky-500 rounded-xl hover:bg-sky-400" v-on:submit="" type="submit">Sign Up</button>
        </form>
    </div>
</template>

<style scoped>

</style>
