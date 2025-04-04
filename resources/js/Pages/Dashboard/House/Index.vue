<script setup>
import LessorDashboardLayout from "@/Layouts/LessorDashboardLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";
import { getHousesAPI } from "@/Services/HouseService.js";
import VPagination from "@/Components/Pagination/VPagination.vue";
import EmptyState from "@/Components/EmptyState.vue";
import FilterModal from "@/Pages/Dashboard/House/Partials/FilterModal.vue";

const props = defineProps({
    currentPage: {
        type: Number,
        default: 1
    },
});

const houses = ref([]);
const pageData = ref();
const currentPage = ref(isNaN(props?.currentPage) ? 1 : props.currentPage);
const params = ref({
    page: currentPage.value,
});
onMounted(() => fetchHouses());

const fetchHouses = async () => {
    try {
        const response = await getHousesAPI(params.value);
        if (response.status === 200 && response.data) {
            houses.value = response.data?.data;
            pageData.value = response.data?.pagination;
        }
    } catch (error) {
        console.error('Error fetching houses: ', error);
    }
}

const onPageChanged = (page) => {
    currentPage.value = page;
    params.value = {
        ...params.value,
        page: page
    }
    fetchHouses();
}

const handleSearch = (data) => {
    params.value = {
        ...params.value,
        ...data.value,
    }
    fetchHouses()
}
</script>

<template>
    <Head title="House" />
    <LessorDashboardLayout>
        <div class="w-full px-6 py-6 mx-auto">
            <div class="flex flex-wrap mt-6 -mx-3">
                <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:flex-none">
                    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                        <div>
                            <Link
                                :href="route('dashboard.house.create')"
                                id="dropdownRadioButton"
                                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                type="button"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span class="mx-2">{{ $t('action.create') }}</span>
                            </Link>
                        </div>
                        <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                            <filter-modal @search="handleSearch" :params="params"></filter-modal>
                        </div>
                    </div>
                    <div class="flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-700 dark:shadow-dark-xl order-black-125 rounded-2xl bg-clip-border">
                        <div class="p-4 pb-0 mb-0 rounded-t-4">
                            <div class="flex justify-between">
                                <h2 class="text-xl mb-2 dark:text-wh ite">{{ $t('label.house.owned') }}</h2>
                            </div>
                        </div>
                        <div v-if="houses.length > 0" class="overflow-x-auto">
                            <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
                                <tbody>
                                    <tr v-for="(item, key) in houses" :key="key">
                                        <td
                                            :class="{'border-b': key !== houses.length - 1}"
                                            class="p-2 align-middle bg-transparent w-3/10 whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex items-center px-2 py-1">
                                                <div>
                                                    <img class="w-10 h-10 rounded" :src="item?.thumbnail" :alt="item?.name">
                                                </div>
                                                <div class="ml-6">
                                                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">{{ $t('label.house.name') }}:</p>
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ item?.name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            :class="{'border-b': key !== houses.length - 1}"
                                            class="p-2 align-middle bg-transparent whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">{{ $t('label.house.price') }}:</p>
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">2500</h6>
                                            </div>
                                        </td>
                                        <td
                                            :class="{'border-b': key !== houses.length - 1}"
                                            class="p-2 align-middle bg-transparent whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="text-center">
                                                <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Value:</p>
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">$230,900</h6>
                                            </div>
                                        </td>
                                        <td
                                            :class="{'border-b': key !== houses.length - 1}"
                                            class="p-2 text-sm leading-normal align-middle bg-transparent whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Bounce:</p>
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">29.9%</h6>
                                            </div>
                                        </td>
                                        <td
                                            :class="{'border-b': key !== houses.length - 1}"
                                            class="p-2 text-sm leading-normal align-middle bg-transparent whitespace-nowrap dark:border-white/40"
                                        >
                                            <div class="flex-1 text-center">
                                                <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"></p>
                                                <Link :href="route('dashboard.house.view')">
                                                    <svg class="size-6 cursor-pointer hover:stroke-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                </Link>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <empty-state
                            v-else
                            :title="$t('label.common.empty_list')"
                            :sub-title="$t('label.common.empty_list_message')"
                        ></empty-state>
                    </div>
                </div>
            </div>
        </div>
        <v-pagination
            v-if="houses?.length > 0"
            :total-items="pageData?.total"
            :items-per-page="pageData?.page_size"
            :current-page="pageData?.page"
            :total-pages="pageData?.total_pages"
            @page-changed="onPageChanged"
        />
    </LessorDashboardLayout>
</template>

<style scoped>

</style>
