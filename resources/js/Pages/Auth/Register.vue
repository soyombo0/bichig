<script setup>
import {Link, useForm, usePage} from "@inertiajs/vue3";
import {computed} from "vue";

let form = useForm({
    email: '',
    name: '',
    password: ''
});

let submit = () => {
  form.post('/auth/signup');
};
const page = usePage()
const error = computed(() => page.props.errors);
</script>

<template>
    <div class="mt-20 m-auto text-center bg-gray-800 bg-opacity-70 p-12 rounded-lg block shadow">
        <h1 class="text-white text-5xl"></h1>
        <form @submit.prevent="submit">
            <div class="grid gap-4">
                <p class="text-3xl font-bold bg-gradient-to-r from-sky-300 to-sky-500 bg-clip-text text-transparent">Bichig Chat</p>
                <label class="text-red-500 text-sm invisible">The password field must be at least 6 characters.</label>
                <input class="rounded-lg text-sm bg-gray-800 text-white p-3 border border-gray-700" v-model="form.email" name="email" type="email" placeholder="Enter email">
                <input class="rounded-lg text-sm bg-gray-800 text-white p-3 border border-gray-700" v-model="form.name" name="username" type="text" placeholder="Enter username">
                <input class="rounded-lg text-sm bg-gray-800 text-white p-3 border border-gray-700" v-model="form.password" name="password" type="password" placeholder="Enter password">
                <label class="text-red-500 text-sm">{{ error.password }}</label>
            </div>
            <div class="grid">
                <Link href="/auth/login" class="text-white hover:text-sky-500 text-sm">Already got account?</Link>
                <button class="p-2 px-12 text-white mt-2 bg-sky-500 rounded-2xl hover:bg-sky-700" type="submit">Sign Up</button>
            </div>
        </form>
    </div>
</template>

<style scoped>

</style>
