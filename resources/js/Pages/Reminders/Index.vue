<script setup>
import { Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import RemindersPanel from '@/Components/RemindersPanel.vue';

defineProps({
    reminders: {
        type: Array,
        required: true
    }
});
</script>

<template>

    <Head title="Reminders" />

    <AuthenticatedLayout>



        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">Reminders</h2>
                <Link :href="route('reminders.create')"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                Create Reminder
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="container mx-auto grid grid-cols-6">
                <div class="col-span-2">
                    <RemindersPanel :reminders="reminders" heading="Reminders" />
                </div>
            </div>
        </div>


    </AuthenticatedLayout>
</template>