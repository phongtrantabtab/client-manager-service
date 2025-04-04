<script setup>
import Menu from '@/Pages/Dashboard/Partials/Menu.vue';
import Navigation from '@/Pages/Dashboard/Partials/Navigation.vue';
import Footer from "@/Pages/Dashboard/Partials/Footer.vue";
import FooterMobile from "@/Pages/Dashboard/Partials/FooterMobile.vue";
import { onBeforeUnmount, onMounted, ref } from "vue";

const TABLET_WIDTH = 768;

const screenWidth = ref(window.innerWidth);

const updateSize = () => {
    screenWidth.value = window.innerWidth;
};

onMounted(() => {
    window.addEventListener('resize', updateSize);
});

onBeforeUnmount(() => {
    window.removeEventListener('resize', updateSize);
});
</script>

<template>
    <div class="m-0 h-[98px] text-base antialiased font-normal dark:bg-slate-950 leading-default bg-gray-50 text-slate-500">
        <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
        <!-- sidenav  -->
        <Menu></Menu>
        <!-- end sidenav -->
        <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-[17rem] rounded-xl">
            <!-- Navbar -->
            <Navigation></Navigation>
            <!-- end Navbar -->
            <slot></slot>
            <Footer v-if="screenWidth >= TABLET_WIDTH"></Footer>
            <FooterMobile v-else></FooterMobile>
        </main>
    </div>
</template>
