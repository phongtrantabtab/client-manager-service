<script setup>
import VIcon from "@/Components/Icons/VIcon.vue";

const emit = defineEmits();
</script>

<template>
    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
        <div class="flex items-center">
            <button
                @click="emit('prev')"
                class="flex px-8 py-2 mb-4 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-red-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85"
            >
                <v-icon name="ArrowRightIcon" />
                &nbsp;Previous step
            </button>
            <button
                type="button"
                class="flex items-center justify-center px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85"
            >
                Submit &nbsp;
                <v-icon name="ArrowRightIcon" />
            </button>
        </div>
    </div>
</template>

<style scoped>

</style>
