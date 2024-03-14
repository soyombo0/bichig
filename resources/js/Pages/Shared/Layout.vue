<script setup>

import Nav from "./Nav.vue";
</script>

<template>
    <div class="">
        <Nav></Nav>

        <section>
            <div class="max-w-2xl mx-auto">
                <slot />
            </div>
        </section>
    </div>

</template>

<style scoped>

</style>
