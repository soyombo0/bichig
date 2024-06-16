<script setup>
import {Link, usePage} from "@inertiajs/vue3";
import { computed } from 'vue';
import axios from "axios";

const page = usePage()
const user = computed(() => page.props.auth.user);

const logout = () => {
    axios.get("/auth/logout")
}
</script>

<template>
    <p class="text-white">{{ user.name }}</p>
    <div class="mt-24 m-auto text-center bg-gray-800 bg-opacity-70 p-12 rounded-lg block shadow">
        <button type="button" v-on:click="logout" class="p-5 bg-sky-400 rounded-2xl hover:bg-sky-700 text-white">Log Out</button>
    </div>
</template>

<style scoped>

</style>
