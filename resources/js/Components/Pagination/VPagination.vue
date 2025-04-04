<template>
    <nav class="flex justify-center items-center mt-4">
        <ul class="flex space-x-2">
            <!-- Previous Button -->
            <li>
                <button
                    aria-label="Go to previous page"
                    class="px-3 py-1 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-200 disabled:opacity-50 disabled:cursor-not-allowed"
                    :disabled="currentPage === 1"
                    @click="changePage(currentPage - 1)"
                >
                    Previous
                </button>
            </li>

            <!-- Page Numbers -->
            <li
                v-for="(page, index) in displayedPages"
                :key="index"
            >
                <button
                    v-if="typeof page === 'number'"
                class="px-3 py-1 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-200"
                :class="{ 'bg-blue-500 text-white': currentPage === page }"
                @click="changePage(page)"
                aria-label="'Go to page ' + page"
                >
                {{ page }}
                </button>
                <span v-if="page === '...'" class="flex items-center justify-center px-3">...</span>
            </li>

            <!-- Next Button -->
            <li>
                <button
                    aria-label="Go to next page"
                    class="px-3 py-1 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-200 disabled:opacity-50 disabled:cursor-not-allowed"
                    :disabled="currentPage === props.totalPages"
                    @click="changePage(currentPage + 1)"
                >
                    Next
                </button>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    totalItems: {
        type: Number,
        required: true
    },
    itemsPerPage: {
        type: Number,
        default: 10
    },
    currentPage: {
        type: Number,
        default: 1
    },
    totalPages: {
        type: Number,
        default: 1
    }
})

// Emits parent when page change
const emit = defineEmits(['page-changed'])

// Create list of displayed pages with ellipsis logic
const displayedPages = computed(() => {
    const pages = []
    const current = props.currentPage;
    const total = props.totalPages;

    // Always show the first page
    pages.push(1);

    // Show ellipsis if the current page is greater than 3
    if (current > 3) {
        pages.push('...');
    }

    // Show the range around the current page (4, 5, 6)
    if (current > 1) {
        pages.push(current - 1); // Previous page
    }

    pages.push(current); // Current page

    if (current < total) {
        pages.push(current + 1); // Next page
    }

    // Always show the last page if it's more than 3 pages away from current
    if (current < total - 2) {
        pages.push('...');
    }
    if (total > 1) {
        pages.push(total);
    }

    // Filter out duplicates and return the final list
    return [...new Set(pages)];
})

// Handle when user change page
const changePage = (page) => {
    if (page >= 1 && page <= props.totalPages) {
        emit('page-changed', page)
    }
}
</script>
