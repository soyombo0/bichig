<script setup>
import Nav from "./Nav.vue";
</script>

<template>
    <div class="">
        <Nav></Nav>

        <section>
            <div class="flex justify-center">
                <slot />
            </div>
        </section>
    </div>

</template>

<style scoped>

</style>
