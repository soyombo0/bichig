<script setup>
import {Link, useForm, usePage} from "@inertiajs/vue3";
import { computed } from 'vue';
import axios from "axios";

const page = usePage()
const user = computed(() => page.props.auth.user);

let logoutForm = useForm({
});

let editForm = useForm({
    email: user.value.email,
    password: "",
    name: user.value.name,
});

const logout = () => {
    logoutForm.get("/auth/logout")
}
const edit = () => {
    editForm.put("/user")
}
</script>

<template>
    <div class="mt-24 m-auto grid justify-between gap-5 bg-gray-800 bg-opacity-70 p-12 rounded-lg shadow">
        <h1 class="text-white text-2xl w-full flex-0">User Settings</h1>
        <form @submit.prevent>
            <div class="flex gap-10">
                <img width="200px" src="./zion-lion.jpg" alt="pfp">
                <div class="flex gap-10 text-center">
                    <div class="grid items-center gap-y-5">
                        <span class="text-white font-bold">Name</span>
                        <span class="text-white font-bold">Email</span>
                        <span class="text-white font-bold">Password</span>
                    </div>
                    <div class="grid gap-y-5">
                        <input
                            class="text-md rounded-lg text-sm bg-gray-800 text-white p-3 border border-gray-700"
                            v-model="editForm.name"
                            placeholder="Name"
                        >
                        <input
                            class="text-md rounded-lg text-sm bg-gray-800 text-white p-3 border border-gray-700"
                            v-model="editForm.email"
                            placeholder="Email"
                        >
                        <input
                            class="text-md rounded-lg text-sm bg-gray-800 text-white p-3 border border-gray-700"
                            v-model="editForm.password"
                            placeholder="Password"
                        >
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <button v-on:click="edit" class="p-2 px-12 text-white mx-7 mt-2 bg-sky-500 rounded-2xl hover:bg-sky-700">Edit</button>
                <button v-on:click="logout" class="p-2 px-12 text-white mx-7 mt-2 bg-red-500 rounded-2xl hover:bg-red-700">Log Out</button>
            </div>
        </form>
    </div>
</template>

<style scoped>

</style>
