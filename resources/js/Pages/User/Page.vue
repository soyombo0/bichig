<script setup>
import {Link, usePage} from "@inertiajs/vue3";
import { computed } from 'vue';

const page = usePage()
const user = computed(() => page.props.auth.user);
</script>

<template>
    <p class="text-white">{{ user.name }}</p>
</template>

<style scoped>

</style>
