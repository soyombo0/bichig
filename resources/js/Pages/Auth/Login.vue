<script setup>
import {Link, useForm} from "@inertiajs/vue3";

let form = useForm({
    email: '',
    password: ''
});

let submit = () => {
    form.post('/auth/signin');
};
</script>

<template>
    <div class="mt-36 m-auto text-center bg-gray-800 bg-opacity-70 p-12 rounded-lg block shadow">
        <form @submit.prevent="submit">
            <div class="grid gap-4">
                <p class="text-3xl font-bold bg-gradient-to-r from-sky-300 to-sky-500 bg-clip-text text-transparent">Bichig Chat</p>
                <input class="rounded-lg text-sm bg-gray-800 text-white p-3 border border-gray-700" v-model="form.email" name="email" type="email" placeholder="Enter email">
                <input class="rounded-lg text-sm bg-gray-800 text-white p-3 border border-gray-700" v-model="form.password" name="password" type="password" placeholder="Enter password">
            </div>
            <div class="grid">
                <Link href="/auth/register" class="text-white mt-2 hover:text-sky-500 text-sm">Don't have account yet?</Link>
                <button class="p-2 px-12 text-white mx-7 mt-2 bg-sky-500 rounded-2xl hover:bg-sky-700" type="submit">Sign In</button>
            </div>
        </form>
    </div>
</template>

<style scoped>

</style>
