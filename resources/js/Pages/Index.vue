<script setup>
import {Link} from "@inertiajs/vue3";

</script>

<template>

    <div class="text-center text-white font-medium">

        <h1 class="text-5xl mt-12 font-bold bg-gradient-to-r from-sky-300 to-sky-500 bg-clip-text text-transparent p-1">Mongol Bichig Chat</h1>

        <div class="grid grid-cols-5 my-20 text-3xl font-bold">
            <p class="text-sky-400/100 rotate-90 whitespace-nowrap">ᠮᠤᠩᠭᠤᠯ ᠬᠡᠯᠡ ᠪᠡᠷ   ᠪᠢᠴᠢᠭᠡᠷᠡᠢ</p>
            <p class="text-sky-400/75 rotate-90 whitespace-nowrap">ᠮᠤᠩᠭᠤᠯ ᠬᠡᠯᠡ ᠪᠡᠷ  ᠪᠢᠴᠢᠭᠡᠷᠡᠢ</p>
            <p class="text-sky-400/50 rotate-90 whitespace-nowrap">ᠮᠤᠩᠭᠤᠯ ᠬᠡᠯᠡ ᠪᠡᠷ  ᠪᠢᠴᠢᠭᠡᠷᠡᠢ</p>
            <p class="text-sky-400/25 rotate-90 whitespace-nowrap">ᠮᠤᠩᠭᠤᠯ ᠬᠡᠯᠡ ᠪᠡᠷ  ᠪᠢᠴᠢᠭᠡᠷᠡᠢ</p>
            <p class="text-sky-400/10 rotate-90 whitespace-nowrap">ᠮᠤᠩᠭᠤᠯ ᠬᠡᠯᠡ ᠪᠡᠷ  ᠪᠢᠴᠢᠭᠡᠷᠡᠢ</p>
        </div>

        <Link href="/chat" type="button" as="button"  class="font-medium text-gray-900 bg-white border-gray-200 rounded-s-lg rounded-r-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white p-2 mt-52">Start Chatting</Link>

    </div>

</template>
