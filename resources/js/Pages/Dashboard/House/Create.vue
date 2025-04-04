<script setup>
import LessorDashboardLayout from "@/Layouts/LessorDashboardLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import {computed, ref} from "vue";
import VStepper from "@/Components/Stepper/VStepper.vue";
import FirstStep from "@/Pages/Dashboard/House/CreatePartials/FirstStep.vue";
import SecondStep from "@/Pages/Dashboard/House/CreatePartials/SecondStep.vue";
import ThirdStep from "@/Pages/Dashboard/House/CreatePartials/ThirdStep.vue";
import {useI18n} from "vue-i18n";

const {t} = useI18n();
const steps = [
    { name: t('label.house.information') },
    { name: t('label.house.add_room') },
    { name: t('label.common.confirmation') },
];
const currentStepName = computed(() => steps[currentStep.value - 1]?.name);
const form = useForm({
    step1Form: {},
    step2Form: {},
    step3Form: {},
})

const currentStep = ref(1);

const updateFormData = (data) => {
    if (currentStep.value <= steps.length) {
        form[`step${currentStep.value}Form`] = data;
    }
};
const nextStep = (data) => {
    updateFormData(data);
    if (currentStep.value < steps.length) {
        currentStep.value++;
    }
};

const prevStep = () => {
    if (currentStep.value > 1) {
        currentStep.value--;
    }
};
const submit = (data) => {
    form.thirdForm = data;
}
</script>

<template>
    <Head title="House create" />

    <LessorDashboardLayout>
        <div class="w-full px-6 py-6 mx-auto mt-4">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                    <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-slate-700 border-0 shadow-xl dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                            <div class="flex items-center">
                                <p class="mb-0 text-xl dark:text-white/80">{{ $t('label.house.add') }}</p>
                            </div>
                        </div>
                        <v-stepper :steps="steps" :active-key="currentStep"></v-stepper>
                        <div v-if="currentStep === 1">
                            <first-step @next="nextStep" :step-name="currentStepName" :form="form.step1Form" />
                        </div>
                        <div v-if="currentStep === 2">
                            <second-step @prev="prevStep" :step-name="currentStepName" @next="nextStep" />
                        </div>
                        <div v-if="currentStep === 3">
                            <third-step @prev="prevStep" :step-name="currentStepName" @submit="submit" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </LessorDashboardLayout>
</template>

<style scoped>

</style>
