<script setup>
import {Link} from "@inertiajs/vue3";

</script>

<template>

    <div class="text-center text-white font-medium">

        <h1 class="text-5xl mt-12">Mongol Bichig Chat</h1>

        <div class="grid grid-cols-5 my-20 text-3xl font-bold">
            <p class="text-sky-400/100 rotate-90 whitespace-nowrap">ᠮᠤᠩᠭᠤᠯ ᠬᠡᠯᠡ ᠪᠡᠷ ᠡ  ᠪᠢᠴᠢᠭᠡᠷᠡᠢ</p>
            <p class="text-sky-400/75 rotate-90 whitespace-nowrap">ᠮᠤᠩᠭᠤᠯ ᠬᠡᠯᠡ ᠪᠡᠷ ᠡ ᠪᠢᠴᠢᠭᠡᠷᠡᠢ</p>
            <p class="text-sky-400/50 rotate-90 whitespace-nowrap">ᠮᠤᠩᠭᠤᠯ ᠬᠡᠯᠡ ᠪᠡᠷ ᠡ ᠪᠢᠴᠢᠭᠡᠷᠡᠢ</p>
            <p class="text-sky-400/25 rotate-90 whitespace-nowrap">ᠮᠤᠩᠭᠤᠯ ᠬᠡᠯᠡ ᠪᠡᠷ ᠡ ᠪᠢᠴᠢᠭᠡᠷᠡᠢ</p>
            <p class="text-sky-400/10 rotate-90 whitespace-nowrap">ᠮᠤᠩᠭᠤᠯ ᠬᠡᠯᠡ ᠪᠡᠷ ᠡ ᠪᠢᠴᠢᠭᠡᠷᠡᠢ</p>
        </div>

        <Link href="/chat" type="button" as="button"  class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 p-3 mt-56 rounded-2xl">Start Chatting</Link>

    </div>

</template>
