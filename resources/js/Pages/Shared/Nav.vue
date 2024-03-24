<script setup>
import {Link} from "@inertiajs/vue3";

</script>
<template>
    <nav class="flex align-middle p-5 justify-between font-medium text-white">
        <p class="text-xl">Bichig chat</p>

        <ul class="flex grid-cols-2 gap-11 mr-12">
            <li><Link href="/chat">Chat</Link></li>
            <li><Link href="/">About</Link></li>
        </ul>
        <ul class="p-4">
        </ul>
    </nav>
</template>

<style scoped>

</style>
