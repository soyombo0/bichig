<script setup>
import {onMounted, ref, onUpdated} from "vue";
import axios from "axios";

</script>

<template>
    <div class="m-auto text-center bg-gray-800 bg-opacity-70 p-12 rounded-lg block shadow">
        <h1 class="text-white text-5xl"></h1>
        <form>
            <div class="grid gap-4">
                <input class="rounded-lg text-sm bg-gray-800 text-white p-3 border border-gray-700" v-model="length" name="email" type="email" placeholder="Enter email">
                <input class="rounded-lg text-sm bg-gray-800 text-white p-3 border border-gray-700" name="password" type="password" placeholder="Enter password">
            </div>
            <button class="p-2 text-white m-7 bg-sky-500 rounded-xl hover:bg-sky-400" v-on:submit="" type="submit">Sign In</button>
        </form>
    </div>
</template>

<style scoped>

</style>
