<script setup>
import {onMounted, ref} from "vue";

let question = ref();

onMounted(async () => {
    question = await axios.get('/learning/question');
});
</script>

<template>
    <div class="mt-20 grid gap-5 bg-gray-800 bg-opacity-70 p-12 rounded-lg shadow text-white">
<!--        <p>{{ question }} There is supposed to be question</p>-->
<!--        <div>-->
<!--            <button-->
<!--                v-for="answer in question.answers"-->
<!--                class="rounded-lg bg-gray-700 mx-10 mt-54"-->
<!--            >-->
<!--                {{ answer.name }}-->
<!--            </button>-->
<!--        </div>-->
        <div>
            <p>Will be soon...</p>
        </div>
    </div>
</template>

<style scoped>

</style>
