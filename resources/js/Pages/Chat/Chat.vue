<script setup>
import {useForm} from "@inertiajs/vue3";

const form = useForm({
   message: null
});


</script>

<template>

    <div class="flex flex-col justify-center p-1 items-center min-h-dvh">
        <div class="flex flex-col flex-grow w-full max-w-xl bg-gray-800 shadow-xl rounded-lg overflow-hidden">
            <div class="flex flex-col flex-grow h-0 p-4 overflow-auto">
                <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                    <div>
                        <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                    </div>
                </div>
                <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                    <div>
                        <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                    </div>
                </div>
                <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                    <div>
                        <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                            <p class="text-sm">Lorem ipsum dolor sit amet.</p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                    </div>
                </div>
                <div class="flex w-full mt-2 space-x-3 max-w-xs">
                    <div>
                        <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                    </div>
                </div>
                <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                    <div>
                        <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
                            <p class="text-sm">Lorem ipsum dolor sit.</p>
                        </div>
                        <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 p-4 border border-gray-700">
                <form @submit.prevent="form.post('/button', {preserveScroll: true, preserveState: false})" class="flex" preserve-scroll>
                    <input v-model="form.message" class="flex items-center h-10 w-full rounded-xl px-3 text-sm" type="text" placeholder="Type your message…">
                    <button type="submit" :disabled="form.processing" class="rounded-xl bg-gray-600 text-white ml-6 w-1/4 shadow">Send</button>
                </form>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
