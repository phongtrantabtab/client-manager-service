<script setup>
defineProps({
    showModal: Boolean
})

const emit = defineEmits(['completeTodo']);
</script>

<template>
    <transition
        name="fade"
        appear
        enter-active-class="ease-out duration-300"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="ease-in duration-200"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div class="fixed inset-0 modal-overlay bg-black bg-opacity-70 top-0 left-0 right-0 bottom-0 z-[1000px]" v-if="showModal" @click="emit('close')"></div>
    </transition>
    <transition
        name="slide"
        appear
        enter-active-class="ease-out duration-300"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="ease-in duration-200"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50" v-if="showModal">
            <slot />
        </div>
    </transition>
</template>

<style scoped>
</style>