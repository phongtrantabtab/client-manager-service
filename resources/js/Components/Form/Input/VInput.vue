<script setup>
import VIcon from "@/Components/Icons/VIcon.vue";

const emit = defineEmits();

const props = defineProps({
    name: { type: String, required: true},
    modelValue: { type: String, required: true},
    class: { type: String, required: false},
    error: { type: String, required: false},
    label: { type: String, required: true},
    icon: { type: String, required: false},
    type: { type: String, default: 'text' },
    placeholder: { type: String, required: false, default: ''},
})
</script>

<template>
    <div
        :class="props.class"
        class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0"
    >
        <div class="mb-4">
            <label
                :for="props.name"
                :class="props.error ? 'text-red-700 dark:text-red-500' : 'text-slate-700 dark:text-white/80'"
                class="inline-block mb-2 ml-1 font-bold text-xs"
            >
                {{ props.label }}&nbsp;
            </label>
            <div v-if="props.icon" class="relative">
                <v-icon :name="props.icon" />
                <input
                    @input="$emit('update:modelValue', $event.target.value)"
                    :value="modelValue"
                    :type="props.type"
                    :name="props.name"
                    :class="{'border-red-500 dark:border-red-500': props.error}"
                    :placeholder="props.placeholder"
                    class="ps-10 focus:shadow-primary-outline dark:bg-slate-900 dark:border-gray-600 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-2.5 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                />
            </div>
            <input
                v-else
                @input="$emit('update:modelValue', $event.target.value)"
                :value="modelValue"
                :type="props.type"
                :name="props.name"
                :class="{'border-red-500 dark:border-red-500': props.error}"
                :placeholder="props.placeholder"
                class="focus:shadow-primary-outline dark:bg-slate-900 dark:border-gray-600 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-2.5 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
            />
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                {{ props.error?.[0] }}
            </p>
        </div>
    </div>
</template>

<style scoped>

</style>