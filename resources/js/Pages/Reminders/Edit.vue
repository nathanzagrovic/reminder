<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ReminderForm from '@/Components/ReminderForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    reminder: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <Head title="Edit Reminder" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Edit Reminder</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <ReminderForm :reminder="reminder" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template> 