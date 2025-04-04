<script setup>
const props = defineProps({
    modelValue: { type: String, required: true },
    label: { type: String, required: true },
    name: { type: String, required: true },
    placeholder: { type: String, default: 'Write your thoughts here...' }
})
</script>

<template>
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
            <div class="mb-4">
                <label :for="props.name" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                    {{ props.label }}&nbsp;
                </label>
                <textarea
                    @input="$emit('update:modelValue', $event.target.value)"
                    :id="props.name"
                    rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    :placeholder="props.placeholder"
                >{{ modelValue }}</textarea>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>