<script setup>
import { onMounted, ref } from "vue";
import { getAddressAPI } from "@/Services/AddressService.js";
import { validateStore } from "@/Services/HouseService.js";
import { Link, useForm } from "@inertiajs/vue3";
import VIcon from "@/Components/Icons/VIcon.vue";
import VInput from "@/Components/Form/Input/VInput.vue";
import VTextArea from "@/Components/Form/TextArea/VTextArea.vue";
import VSelect from "@/Components/Form/Select/VSelect.vue";

const emit = defineEmits();
const props = defineProps({
    form: Object,
})

const address = ref();
const form = useForm({
    address: {
        province: props.form?.address?.province || null,
        district: props.form?.address?.district || null,
        ward: props.form?.address?.ward || null,
        detail: props.form?.address?.detail || null,
    },
    name: props.form?.name || null,
    description: props.form?.description || null,
    thumbnail: props.form?.thumbnail || null,
    category: props.form?.category || null,
    phone: props.form?.phone || null,
    step: 1,
});

onMounted(async() => {
    await fetchAddress();
})

const fetchAddress = async () => {
    try {
        const response = await getAddressAPI();
        if (response.status === 200 && response.data) {
            address.value = response.data.data;
        }
    } catch (error) {
        console.error('Error fetching houses:', error);
    }
}

const handleSubmit = async () => {
    try {
        const response = await validateStore(form);
        if (response.status === 200 && response.data) {
            if (form.errors !== null) {
                emit('next', form)
            }
        }
    } catch (error) {
        if (error.response && error.response.status === 422) {
            form.errors = error.response.data.errors;
        }
    }
}
</script>

<template>
    <div class="flex-auto p-6">
        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">{{ $t('label.house.information') }}</p>
        <div class="flex flex-wrap -mx-3">
            <v-input
                v-model="form.name"
                :error="form.errors?.name"
                :label="$t('label.house.name')"
                name="name"
                placeholder="Enter name here"
            />
            <v-input
                v-model="form.phone"
                :error="form.errors?.phone"
                :label="$t('label.house.phone_number')"
                name="phone"
                icon="PhoneIcon"
                placeholder="+84 123 456 789"
            />
        </div>
        <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">{{ $t('label.house.address_info') }}</p>
        <div class="flex flex-wrap -mx-3">
            <v-select
                v-model="form.address.province"
                :data="address"
                :label="$t('label.house.province')"
                name="province"
            />
            <v-select
                v-model="form.address.district"
                :data="form.address?.province?.districts"
                :label="$t('label.house.district')"
                name="district"
            />
            <v-select
                v-model="form.address.ward"
                :data="form.address?.district?.wards"
                :label="$t('label.house.ward')"
                name="ward"
            />
            <v-input
                v-model="form.address.detail"
                :error="form.errors['address.detail']"
                :label="$t('label.house.address_detail')"
                class="md:w-full"
                name="detail-address"
                :placeholder="$t('label.house.address_detail')"
            />
        </div>
        <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">{{ $t('label.house.detail') }}</p>
        <v-text-area
            v-model="form.description"
            name="description"
            label="Description"
        />
    </div>
    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
        <div class="flex items-center">
            <Link
                :href="route('dashboard.house.index')"
                class="inline-block px-8 py-2 mb-4 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-red-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85"
            >
                {{ $t('action.cancel') }}
            </Link>
            <button
                type="button"
                class="flex items-center justify-center px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85"
                @click="handleSubmit"
            >
                {{ $t('action.next_step') }}
                <v-icon name="ArrowRightIcon" />
            </button>
        </div>
    </div>
</template>

<style scoped>

</style>
