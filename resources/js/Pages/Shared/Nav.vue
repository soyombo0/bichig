<script setup>
import {Link} from "@inertiajs/vue3";

</script>
<template>
    <nav class="flex align-middle p-5 justify-between font-medium text-white">
        <p class="text-xl font-bold bg-gradient-to-r from-sky-300 to-sky-500 bg-clip-text text-transparent">Bichig Chat</p>

        <ul class="flex grid-cols-2 gap-11 mr-10">
            <li class="hover:text-sky-500"><Link href="/chat">Chat</Link></li>
            <li class="hover:text-sky-500"><Link href="/">Home</Link></li>
        </ul>

       <Link href="/contact" class="hover:text-sky-500">Contact</Link>
    </nav>
</template>

<style scoped>

</style>
