<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ReminderForm from '@/Components/ReminderForm.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Create Reminder" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Create Reminder</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <ReminderForm />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template> 