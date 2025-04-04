<script setup>
const emit = defineEmits();

const props = defineProps({
    name: { type: String, required: true },
    modelValue: { type: Object, required: true },
    data: { type: Object, required: true },
    class: { type: String, required: false },
    error: { type: String, required: false },
    label: { type: String, required: true },
})
</script>

<template>
    <div
        :class="props.class"
        class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0"
    >
        <div class="mb-4">
            <label :for="props.name" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                {{ props.label }}&nbsp;
            </label>
            <select
                @change="$emit('update:modelValue', props.data?.[$event.target.value])"
                :id="props.name"
                class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
                <option value="" selected>{{ $t('label.common.please_select') }}</option>
                <option v-for="(item, key) in data" :key="key" :value="key">
                    {{ item.name }}
                </option>
            </select>
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                {{ props.error?.[0] }}
            </p>
        </div>
    </div>
</template>

<style scoped>

</style>