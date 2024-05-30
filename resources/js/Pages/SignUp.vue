<script setup>

</script>

<template>
    <div class="text-center bg-gray-800 bg-opacity-70 shadow pb-32 w-3/4 pt-0.5 mt-16 rounded-lg block shadow ml-20">
        <p class="text-4xl mt-10 font-bold bg-gradient-to-r from-sky-300 to-sky-500 bg-clip-text text-transparent">Bichig Chat</p>

        <div class="flex flex-col justify-center items-center mt-10 space-x-10">
            <form class="grid grid-rows-3 space-y-5">
                <input name="name" placeholder="Name" class="rounded p-1">
                <input name="email" placeholder="Email" class="rounded p-1">
                <input name="password" placeholder="Password" class="rounded">

                <button type="submit" class="bg-sky-400 rounded">Sign Up</button>
            </form>
        </div>
    </div>
</template>
