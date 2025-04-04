<script setup>
defineProps({
    steps: Array,
    activeKey: Number,
})
const getStepClass = (index, activeKey) => {
    return {
        'text-blue-600 dark:text-blue-500': activeKey === index + 1,
        'text-gray-500 dark:text-gray-400': activeKey < index + 1,
        'text-green-500 dark:text-green-400': activeKey > index + 1,
    };
}

const getIndicatorClass = (index, activeKey) => {
    return activeKey === index + 1
        ? 'dark:border-blue-500 border-blue-600'
        : 'dark:border-gray-400 border-gray-500';
}
</script>

<template>
    <ol class="flex items-center justify-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-slate-700 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
        <li
            v-for="(item, key) in steps"
            :key="key"
            :class="getStepClass(key, activeKey)"
            class="flex items-center"
        >
            <span
                v-if="activeKey <= key + 1"
                :class="getIndicatorClass(key, activeKey)"
                class="flex items-center justify-center w-5 h-5 me-2 text-xs border-2 rounded-full shrink-0"
            >
                {{ key + 1 }}
            </span>
            <span v-else class="text-green-600 border-green-600 flex items-center justify-center w-5 h-5 me-2 text-xs border-2 rounded-full shrink-0">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="3"
                    stroke="currentColor"
                    class="size-3"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                </svg>
            </span>
            {{ item.name }}
            <svg
                v-if="key < steps.length - 1"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6 ms-2 sm:ms-4 rtl:rotate-180"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
            </svg>
        </li>
    </ol>
</template>

<style scoped>

</style>
