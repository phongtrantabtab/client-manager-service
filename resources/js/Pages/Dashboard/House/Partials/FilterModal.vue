<script setup>
import {ref} from "vue";
import VModal from "@/Components/Modal/VModal.vue";
import VIcon from "@/Components/Icons/VIcon.vue";

const props = defineProps({
    params: Object,
})

const emit = defineEmits(['search']);

const isOpen = ref(false);
const formSearch = ref({
    keyword: props.params?.keyword ?? null,
    phone: props.params?.phone ?? null,
});

const submitModal = () => {
    emit('search', formSearch)
    isOpen.value = false;
}
const clearForm = () => {
    formSearch.value = {
        keyword: null,
        phone: null,
    }
}
</script>

<template>
    <button
        id="show-modal"
        class="inline-flex mx-2 items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
        @click="isOpen = !isOpen"
    >
        <v-icon name="FilterIcon" />
    </button>
    <v-modal :show-modal="isOpen" @close="isOpen = false">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <v-icon name="FilterIcon" class="text-white mx-2" />
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ $t('label.common.search_filter') }}
                    </h3>
                    <button
                        @click="isOpen = false"
                        type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal"
                    >
                        <v-icon name="CloseIcon" />
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                            <div class="mb-4">
                                <label for="name" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                    {{ $t('label.common.keyword') }}
                                </label>
                                <input
                                    v-model="formSearch.keyword"
                                    type="text"
                                    name="name"
                                    class="focus:shadow-primary-outline dark:bg-slate-900 dark:border-gray-600 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                />
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                            <div class="mb-4">
                                <label for="phone-number" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                    {{ $t('label.house.phone_number') }}
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                                        <v-icon name="PhoneIcon" />
                                    </div>
                                    <input
                                        v-model="formSearch.phone"
                                        type="text"
                                        id="phone-input"
                                        aria-describedby="helper-text-explanation"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-slate-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                        placeholder="+84 123 456 789"
                                        required
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-between items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button
                        @click="clearForm"
                        data-modal-hide="default-modal"
                        type="button"
                        class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-700 dark:hover:bg-red-600 dark:focus:ring-blue-800"
                    >
                        {{ $t('label.common.clear') }}
                    </button>
                    <button
                        @click="submitModal"
                        data-modal-hide="default-modal"
                        type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        {{ $t('label.common.search') }}
                    </button>
                </div>
            </div>
        </div>
    </v-modal>
</template>
