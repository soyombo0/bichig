<script setup>

import Message from "./Message.vue";
import {onUpdated, ref} from "vue";

const props = defineProps({
    messages: Object,
    me: Boolean
});

const bottomRef = ref(null);

onUpdated(() => {
    bottomRef.value.scrollIntoView({ behavior: 'smooth' });
});

</script>

<template>
    <ul>
        <Message v-for="(message, index) in messages" :key="index" :message="message" :me="me"></Message>
        <div ref="bottomRef"></div>
    </ul>
</template>

<style scoped>

</style>
