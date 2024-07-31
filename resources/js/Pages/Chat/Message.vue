<script setup>

const props = defineProps({
    message: String,
});

</script>

<template>
    <div  v-if="message.me" :class="{'flex w-full mt-2 space-x-3 max-w-xs' : message.me == false}" class="">
        <div>
                <li id="inputMessage"
                    class="mt-2 text-sm bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg"
                    :class="{'mt-2 text-sm text-white bg-gray-700 rounded-r-lg rounded-bl-lg' : message.me === false}"
                    :id="{'rMessage' : message.me === false}"
                >
                    {{ message.message }}
                </li>
        </div>
    </div>
    <div  v-else class="'flex w-full mt-2 space-x-3 max-w-xs">
        <div>
            <li
                class="mt-2 p-3 text-sm text-white bg-gray-700 rounded-r-lg rounded-bl-lg"
                id="rMessage"
            >
                {{ message }}
            </li>
        </div>
    </div>

</template>

<style scoped>
#inputMessage {
    float: right;
    clear: both;
    overflow: auto;
    font-size: 25px;
    -moz-writing-mode: vertical-lr;
    writing-mode: vertical-lr;
    -webkit-writing-mode: vertical-lr;
    -o-writing-mode: vertical-lr;
    -ms-writing-mode: tb-lr;
    writing-mode: tb-lr;
    -webkit-text-orientation: sideways-right;
}

#rMessage {
    float: left;
    clear: both;
    overflow: auto;
    font-size: 25px;
    -moz-writing-mode: vertical-lr;
    writing-mode: vertical-lr;
    -webkit-writing-mode: vertical-lr;
    -o-writing-mode: vertical-lr;
    -ms-writing-mode: tb-lr;
    writing-mode: tb-lr;
    -webkit-text-orientation: sideways-right;
}
</style>
