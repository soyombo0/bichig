<script setup>
import {Link, usePage} from "@inertiajs/vue3";
import { computed } from 'vue';

const page = usePage()
const user = computed(() => page.props.auth.user);
</script>
<template>
    <nav class="flex align-middle p-5 justify-between font-medium text-white">
        <p class="text-xl font-bold bg-gradient-to-r from-sky-300 to-sky-500 bg-clip-text text-transparent">Bichig Chat</p>

        <ul class="flex grid-cols-2 gap-6 md:gap-11 md:mr-10">
            <li class="hover:text-sky-500"><Link href="/chat">Chat</Link></li>
            <li class="hover:text-sky-500"><Link href="/">Home</Link></li>
        </ul>

        <Link href="/user" class="hover:text-sky-500" v-if="user">{{ user.name }}</Link>
        <Link href="/auth/login" class="hover:text-sky-500" v-else>Sign In</Link>
    </nav>
</template>

<style scoped>

</style>
