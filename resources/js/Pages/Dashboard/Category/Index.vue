<script setup>
import LessorDashboardLayout from "@/Layouts/LessorDashboardLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

const houses = [
    { name: 'Test1' },
    { name: 'Test2' },
    { name: 'Test3' },
    { name: 'Test4' },
    { name: 'Test5' },
]
</script>

<template>
    <Head title="Category" />
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
                                <span class="mx-2">New</span>
                            </Link>
                        </div>
                        <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                            <div class="mx-4">
                                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                    <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                                    </svg>
                                    Last 30 days
                                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownRadio" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                                    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                                        <li>
                                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <input id="filter-radio-example-1" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="filter-radio-example-1" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last day</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <input checked="" id="filter-radio-example-2" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="filter-radio-example-2" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 7 days</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <input id="filter-radio-example-3" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="filter-radio-example-3" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last 30 days</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <input id="filter-radio-example-4" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="filter-radio-example-4" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last month</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <input id="filter-radio-example-5" type="radio" value="" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="filter-radio-example-5" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last year</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input type="text" id="table-search" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                            </div>
                        </div>
                    </div>
                    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-700 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border">
                        <div class="p-4 pb-0 mb-0 rounded-t-4">
                            <div class="flex justify-between">
                                <h6 class="mb-2 dark:text-white">Category list</h6>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
                                <tbody>
                                <tr v-for="(item, key) in houses" :key="key">
                                    <td
                                        :class="{'border-b': key !== houses.length - 1}"
                                        class="p-2 align-middle bg-transparent w-3/10 whitespace-nowrap dark:border-white/40"
                                    >
                                        <div class="flex items-center px-2 py-1">
                                            <div>
                                                <img src="../../../assets/img/icons/flags/US.png" alt="Country flag" />
                                            </div>
                                            <div class="ml-6">
                                                <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Name:</p>
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ item.name }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        :class="{'border-b': key !== houses.length - 1}"
                                        class="p-2 align-middle bg-transparent whitespace-nowrap dark:border-white/40"
                                    >
                                        <div class="text-center">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Sales:</p>
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
                    </div>
                </div>
            </div>
        </div>
    </LessorDashboardLayout>
</template>

<style scoped>

</style>
