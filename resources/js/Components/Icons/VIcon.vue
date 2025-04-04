<template>
    <component :is="getComponent(name)" :class="classes" :color="color"></component>
</template>

<script setup>
import ArrowRightIcon from "@/Components/Icons/Partials/ArrowRightIcon.vue";
import TimerIcon from "@/Components/Icons/Partials/TimerIcon.vue";
import DropDownIcon from "@/Components/Icons/Partials/DropDownIcon.vue";
import FilterIcon from "@/Components/Icons/Partials/FilterIcon.vue";
import CloseIcon from "@/Components/Icons/Partials/CloseIcon.vue";
import SearchIcon from "@/Components/Icons/Partials/SearchIcon.vue";
import PhoneIcon from "@/Components/Icons/Partials/PhoneIcon.vue";
import BellIcon from "@/Components/Icons/Partials/BellIcon.vue";
import VerifiedIcon from "@/Components/Icons/Partials/VerifiedIcon.vue";
import ProfileIcon from "@/Components/Icons/Partials/ProfileIcon.vue";
import IntegrationIcon from "@/Components/Icons/Partials/IntegrationIcon.vue";
import SettingIcon from "@/Components/Icons/Partials/SettingIcon.vue";
import DocumentIcon from "@/Components/Icons/Partials/DocumentIcon.vue";
import HelpIcon from "@/Components/Icons/Partials/HelpIcon.vue";
import LogoutIcon from "@/Components/Icons/Partials/LogoutIcon.vue";
import LanguageIcon from "@/Components/Icons/Partials/LanguageIcon.vue";
import CheckIcon from "@/Components/Icons/Partials/CheckIcon.vue";

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
    classes: {
        type: String,
        required: false,
        default: "icon-xs",
    },
    color: String
});

const getComponent = (name) => {
    const components = {
        ArrowRightIcon,
        TimerIcon,
        DropDownIcon,
        FilterIcon,
        CloseIcon,
        SearchIcon,
        PhoneIcon,
        BellIcon,
        VerifiedIcon,
        ProfileIcon,
        IntegrationIcon,
        SettingIcon,
        DocumentIcon,
        HelpIcon,
        LogoutIcon,
        LanguageIcon,
        CheckIcon,
    };
    return components[name] || null;
};
</script>
