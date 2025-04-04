<script setup>
import { ref } from "vue";
import { debounce } from 'lodash';

const emit = defineEmits();

const props = defineProps({
    apiSearch: Function,
})

const input = ref('');
const data = ref([]);
const isDropdownVisible = ref(false);

const getData = debounce(async () => {
    try {
        const res = await props.apiSearch({keyword: input.value});
        if (res.data) {
            data.value = res.data.data;
            isDropdownVisible.value = true;
        }
    } catch (e) {
        console.log(e)
    }
}, 500)

const selectItem = (item) => {
    input.value = item.name;
    isDropdownVisible.value = false;
    emit('search', input.value)
}
</script>

<template>
    <div id="table-search" class="w-full inline-flex relative" data-hs-combo-box="">
        <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input
                @keyup="getData"
                v-model="input"
                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-neutral-900 dark:border-neutral-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                type="text"
                role="combobox"
                aria-expanded="false"
                placeholder="Search keyword"
            >
        </div>
        <div
            v-if="isDropdownVisible && data.length > 0"
            class="mt-10 absolute z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-neutral-900 dark:border-neutral-700"
        >
            <div
                v-for="item in data"
                :key="item.id"
                class="cursor-pointer py-2 px-4 w-full text-sm text-gray-800 hover:bg-gray-100 rounded-lg dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200"
                @click="selectItem(item)"
            >
                <div class="flex justify-between items-center w-full">
                    <span>{{ item.name }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>