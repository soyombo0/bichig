<script setup>
import { ref, computed } from 'vue';
import axios from 'axios';
import { Link, usePage, router } from '@inertiajs/vue3';

const props = defineProps({
    chats: Array
});

const page = usePage();
const error = computed(() => page.props.errors);
const chatsList = ref(props.chats || []);

// Users state for the popup
const users = ref([]);
const isPopupVisible = ref(false);
const isLoading = ref(false);
const selectedUser = ref(null);
const user = ref(null); // Current user (firstUser)
const isCreatingChat = ref(false);

function showUsers() {
    isLoading.value = true;
    isPopupVisible.value = true;
    selectedUser.value = null; // Reset selection when opening popup

    axios.get('/users')
        .then(response => {
            users.value = response.data;
            isLoading.value = false;
        })
        .catch(err => {
            console.error('Failed to load users:', err);
            isLoading.value = false;
        });
}

function selectUser(user) {
    selectedUser.value = user;
}

function closePopup() {
    isPopupVisible.value = false;
}

function refreshChats() {
    // Fetch updated chats list
    axios.get('/chats')
        .then(response => {
            chatsList.value = response.data;
        })
        .catch(err => {
            console.error('Failed to refresh chats:', err);
        });
}

function createChat() {
    if (!selectedUser.value) {
        return;
    }

    isCreatingChat.value = true;

    axios.post('/chats', {
        firstUser: user.value,
        secondUser: selectedUser.value
    }, {
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => {
            if (response.data && response.data.id) {
                chatsList.value.push(response.data);

                refreshChats();

            }

            isCreatingChat.value = false;
            closePopup();
        })
        .catch(err => {
            console.error('Failed to create chat:', err);
            isCreatingChat.value = false;
        });
}
</script>

<template>
    <div class="flex flex-col mt-20 bg-gray-800 bg-opacity-70 p-12 rounded-lg shadow text-white">
        <div class="text-xl font-bold border-b-2">Chats</div>
        <Link :href="`/chats/${chat.id}`" v-for="chat in chatsList" :key="chat.id" class="flex py-2 p-4 my-1 gap-4 border-gray-500 border hover:bg-gray-700 rounded-lg">
            <p>Chat:</p>
            <p>{{chat.users[0].name}}</p>
        </Link>
        <div v-if="chatsList.length === 0" class="py-4 text-center text-gray-400">
            No chats yet. Create your first chat!
        </div>
        <button @click="showUsers" class="p-2 px-12 mt-16 text-white bg-sky-500 rounded-2xl hover:bg-sky-700" type="submit">Create chat</button>
    </div>

    <div v-if="isPopupVisible" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="absolute inset-0 bg-black bg-opacity-50" @click="closePopup"></div>

        <div class="bg-gray-800 rounded-lg p-6 max-w-md w-full mx-4 z-10 text-white border border-gray-700 shadow-xl">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Select User for Chat</h3>
                <button @click="closePopup" class="text-gray-400 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div v-if="isLoading" class="flex justify-center py-8">
                <div class="animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-sky-500"></div>
            </div>

            <div v-else-if="users.length === 0" class="py-4 text-center text-gray-400">
                No users found
            </div>

            <div v-else class="max-h-64 overflow-y-auto">
                <div v-for="user in users" :key="user.id"
                     @click="selectUser(user)"
                     class="flex items-center p-3 border-b border-gray-700 hover:bg-gray-700 cursor-pointer rounded"
                     :class="{'bg-gray-700': selectedUser && selectedUser.id === user.id}">
                    <div class="w-10 h-10 bg-sky-500 rounded-full flex items-center justify-center mr-3">
                        {{ user.name.charAt(0).toUpperCase() }}
                    </div>
                    <div>
                        <p class="font-medium">{{ user.name }}</p>
                        <p class="text-sm text-gray-400">{{ user.email }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-4 flex justify-end">
                <button @click="closePopup" class="mr-2 px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded">
                    Cancel
                </button>
                <button
                    @click="createChat"
                    class="px-4 py-2 bg-sky-500 hover:bg-sky-600 rounded flex items-center"
                    :disabled="!selectedUser || isCreatingChat"
                    :class="{'opacity-50 cursor-not-allowed': !selectedUser || isCreatingChat}">
                    <span v-if="isCreatingChat" class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin mr-2"></span>
                    Create Chat
                </button>
            </div>
        </div>
    </div>
</template>
