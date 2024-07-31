<script setup>

import Message from "./Message.vue";

const props = defineProps({
    messages: Object,
});

</script>

<template>
    <ul>
        <Message v-for="(message, index) in messages" :key="index" :message="message"></Message>
    </ul>
</template>

<style scoped>

</style>
