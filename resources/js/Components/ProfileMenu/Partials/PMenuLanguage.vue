<script setup>
import {Link} from "@inertiajs/vue3";
import VIcon from "@/Components/Icons/VIcon.vue";
import {changeLangAPI} from "@/Services/LanguageService.js";
import {useI18n} from "vue-i18n";

const props = defineProps({
    item: Array,
})

const { locale } = useI18n();
const handleSelectItem = async item => {
    if (item?.href) {
        const res = await changeLangAPI(item.href);
        if (res.data?.success) {
            locale.value = res.data?.language || 'vi';
        }
    }
}
</script>

<template>
    <div
        v-for="(i, key) in item?.sub"
        :key="key"
    >
        <button
            @click="handleSelectItem(i)"
            v-if="item?.type === 'check'"
            class="flex items-center justify-between leading-6 space-x-3 py-3 px-4 w-full text-base text-gray-600 dark:text-white focus:outline-none hover:bg-gray-100 dark:hover:bg-gray-900 rounded-md"
        >
            <div class="flex items-center space-x-3">
                <v-icon :name="i.icon" />
                <span>{{ i.name }}</span>
            </div>
            <v-icon v-if="locale === i.value" name="CheckIcon" />
        </button>
        <Link
            v-else
            :href="i.href"
            class="flex items-center justify-between leading-6 space-x-3 py-3 px-4 w-full text-base text-gray-600 dark:text-white focus:outline-none hover:bg-gray-100 dark:hover:bg-gray-900 rounded-md"
        >
            <div class="flex items-center space-x-3">
                <v-icon :name="i.icon" />
                <span>{{ i.name }}</span>
            </div>
        </Link>
    </div>
</template>

<style scoped>

</style>