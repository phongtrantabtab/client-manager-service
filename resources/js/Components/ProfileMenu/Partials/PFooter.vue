<script setup>
import VIcon from "@/Components/Icons/VIcon.vue";
</script>

<template>
    <div aria-label="footer" class="pt-2">
        <button
            type="button"
            class="flex items-center space-x-3 py-3 px-4 w-full leading-6 text-base text-gray-600 dark:text-white focus:outline-none hover:bg-gray-100 dark:hover:bg-gray-900 rounded-md"
        >
            <v-icon name="LogoutIcon" />
            <span>Logout</span>
        </button>
    </div>
</template>
