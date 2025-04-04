<script setup>
import {
    ArrowPathIcon,
    ChartPieIcon,
    CursorArrowRaysIcon,
    FingerPrintIcon,
    SquaresPlusIcon,
    Square3Stack3DIcon
} from "@heroicons/vue/24/outline/index.js";
import { Link } from "@inertiajs/vue3";
import {useI18n} from "vue-i18n";

const { t } = useI18n();

const menuItems = [
    { name: t('menu.profile'), href: route('dashboard.profile.edit'), route: ['dashboard.profile.edit'],icon: ChartPieIcon },
    { name: t('menu.house'), href: route('dashboard.house.index'), route: ['dashboard.house.index', 'dashboard.house.create', 'dashboard.house.view'], icon: CursorArrowRaysIcon },
    { name: t('menu.category'), href: route('dashboard.category.index'), route: ['dashboard.category.index'], icon: Square3Stack3DIcon },
    { name: t('menu.security'), href: '#', route: [], icon: FingerPrintIcon },
    { name: t('menu.integrations'), href: '#', route: [], icon: SquaresPlusIcon },
    { name: t('menu.automations'), href: '#', route: [], icon: ArrowPathIcon },
];
let currentRouteName = route().current();
</script>

<template>
    <aside class="fixed inset-y-0 dark:bg-slate-700 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
        <div class="h-19">
            <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
            <Link
                :href="route('dashboard')"
                class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700"
            >
                <img src="../../../assets/img/logo-ct-dark.png" class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8" alt="main_logo" />
                <img src="../../../assets/img/logo-ct.png" class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8" alt="main_logo" />
                <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">{{ t('label.dashboard') }}</span>
            </Link>
        </div>

        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <li v-for="(item, key) in menuItems" :key="key" class="mt-0.5 w-full">
                    <a
                        :href="item?.href"
                        :class="item?.route?.includes(currentRouteName) ? ['active', 'dark:bg-slate-900', 'rounded-lg'] : ''"
                        class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                    >
                        <div class="mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <component :is="item?.icon" class="relative dark:text-white h-[16px] w-[16px] group-hover:text-indigo-600" aria-hidden="true" />
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">{{ item?.name }}</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mx-4 mt-4">
            <!-- pro btn  -->
            <a class="inline-block w-full px-8 py-2 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md select-none bg-150 bg-x-25 hover:shadow-xs hover:-translate-y-px" href="https://www.creative-tim.com/product/argon-dashboard-pro-tailwind?ref=sidebarfree" target="_blank">Upgrade to pro</a>
        </div>
    </aside>
</template>
