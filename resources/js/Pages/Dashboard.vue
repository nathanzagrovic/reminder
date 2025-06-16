<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ReminderStats from '@/Components/ReminderStats.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    totalReminders: {
        type: Number,
        required: true
    }
});
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <ReminderStats :total-reminders="totalReminders" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
