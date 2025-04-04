<script setup>
import {ref} from "vue";
import { Link } from '@inertiajs/vue3';
import {Popover, PopoverButton, PopoverGroup, PopoverPanel} from "@headlessui/vue";
import {ChevronDownIcon, ChevronLeftIcon, ChevronRightIcon} from "@heroicons/vue/20/solid/index.js";
import VIcon from "@/Components/Icons/VIcon.vue";
import PAccountUpgrade from "@/Components/ProfileMenu/Partials/PAccountUpgrade.vue";
import PFooter from "@/Components/ProfileMenu/Partials/PFooter.vue";
import PMenuLanguage from "@/Components/ProfileMenu/Partials/PMenuLanguage.vue";

const menuItems = [
    {name: 'Account Settings', href: route('login'), icon: 'ProfileIcon'},
    {name: 'Integrations', href: route('login'), icon: 'IntegrationIcon'},
    {name: 'Settings', href: route('login'), icon: 'SettingIcon'},
    {name: 'Guide', href: route('login'), icon: 'DocumentIcon'},
    {name: 'Helper Center', href: route('login'), icon: 'HelpIcon'},
    {name: 'Language', href: route('login'), icon: 'LanguageIcon', type: 'check', subComponent: 'PMenuLanguage', sub: [
            {name: 'Vietnamese', value: 'vi', href: 'lang/vi', icon: 'LanguageIcon'},
            {name: 'English', value: 'en', href: 'lang/en', icon: 'LanguageIcon'},
        ]
    },
];

const selectedMenu = ref(null);

const getComponent = (name) => {
    const components = {
        PMenuLanguage,
    };
    return components[name] || null;
};
const handleClickSubMenu = item => {
    selectedMenu.value = item || null;
}
</script>

<template>
    <PopoverGroup class="hidden lg:flex lg:gap-x-12">
        <Popover class="relative">
            <PopoverButton class="flex items-center gap-x-1 focus:outline-none text-sm font-semibold leading-6 text-gray-900 dark:text-white dark:text-white">
                <img class="w-10 h-10 rounded-full" src="https://avatars.githubusercontent.com/u/499550?v=4" alt="Rounded avatar">
                Evan You
                <ChevronDownIcon class="h-5 w-5 flex-none text-gray-400" aria-hidden="true" />
            </PopoverButton>

            <transition v-if="!selectedMenu" enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
                <PopoverPanel class="absolute right-1 top-full z-10 mt-3 lg:w-[300px] dark:bg-gray-800 max-w-md overflow-hidden rounded-xl bg-gray-50 shadow-lg ring-1 ring-gray-900/5">
                    <div class="flex items-center justify-center bg-gray-50">
                        <div
                            class="w-full max-w-sm rounded-lg bg-gray-50 dark:bg-gray-800 p-3 drop-shadow-xl divide-y divide-gray-200 dark:divide-gray-500"
                        >
                            <div aria-label="header" class="flex space-x-4 items-center p-4">
                                <div aria-label="avatar" class="flex mr-auto items-center space-x-4">
                                    <img
                                        src="https://avatars.githubusercontent.com/u/499550?v=4"
                                        alt="avatar Evan You"
                                        class="w-16 h-16 shrink-0 rounded-full"
                                    />
                                    <div class="space-y-2 flex flex-col flex-1 truncate">
                                        <div class="font-medium relative text-xl leading-tight text-gray-900 dark:text-white">
                                            <span class="flex">
                                                <span class="truncate relative pr-8">
                                                    Evan You
                                                    <span
                                                        aria-label="verified"
                                                        class="absolute top-1/2 -translate-y-1/2 right-0 inline-block rounded-full"
                                                    >
                                                        <v-icon name="VerifiedIcon" />
                                                    </span>
                                                </span>
                                            </span>
                                        </div>
                                        <p class="font-normal text-base leading-tight text-gray-500 truncate">
                                            evanyou@gmail.com
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div aria-label="navigation" class="py-2">
                                <nav class="grid gap-1">
                                    <div
                                        v-for="(item, key) in menuItems"
                                        :key="key"
                                    >
                                        <button
                                            v-if="item.sub"
                                            @click="handleClickSubMenu(item)"
                                            class="flex items-center justify-between leading-6 space-x-3 py-3 px-4 w-full text-base text-gray-600 dark:text-white focus:outline-none hover:bg-gray-100 dark:hover:bg-gray-900 rounded-md"
                                        >
                                            <div class="flex items-center space-x-3">
                                                <v-icon :name="item.icon" />
                                                <span>{{ item.name }}</span>
                                            </div>
                                            <ChevronRightIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                        </button>
                                        <Link
                                            v-else
                                            :href="item.href"
                                            class="flex items-center justify-between leading-6 space-x-3 py-3 px-4 w-full text-base text-gray-600 dark:text-white focus:outline-none hover:bg-gray-100 dark:hover:bg-gray-900 rounded-md"
                                        >
                                            <div class="flex items-center space-x-3">
                                                <v-icon :name="item.icon" />
                                                <span>{{ item.name }}</span>
                                            </div>
                                        </Link>
                                    </div>

                                </nav>
                            </div>
                            <p-account-upgrade />
                            <p-footer />
                        </div>
                    </div>
                </PopoverPanel>
            </transition>
            <transition v-else enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
                <PopoverPanel class="absolute right-1 top-full z-10 mt-3 lg:w-[300px] dark:bg-gray-800 max-w-md overflow-hidden rounded-xl bg-gray-50 shadow-lg ring-1 ring-gray-900/5">
                    <div class="flex items-center justify-center bg-gray-50">
                        <div
                            class="w-full max-w-sm rounded-lg bg-gray-50 dark:bg-gray-800 p-3 drop-shadow-xl divide-y divide-gray-200 dark:divide-gray-500"
                        >
                            <div @click="handleClickSubMenu(null)" aria-label="header" class="flex items-center leading-6 space-x-3 py-3 px-4 w-full text-base text-gray-600 dark:text-white focus:outline-none hover:bg-gray-100 dark:hover:bg-gray-900 rounded-md">
                                <ChevronLeftIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                Back
                            </div>
                            <div aria-label="navigation" class="py-2">
                                <nav class="grid gap-1">
                                    <component :is="getComponent(selectedMenu?.subComponent)" :item="selectedMenu" @back="handleClickSubMenu" />
                                </nav>
                            </div>
                        </div>
                    </div>
                </PopoverPanel>
            </transition>
        </Popover>
    </PopoverGroup>
</template>

<style scoped>
</style>