<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
const page = usePage();
import { computed } from 'vue';
import RemindersPanel from "@/Components/RemindersPanel.vue";
const reminders = computed(() => page.props.reminders);
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Reminders</h2>
        </template>
        <RemindersPanel :reminders="reminders" heading="Your Reminders"></RemindersPanel>
    </AuthenticatedLayout>
</template>
