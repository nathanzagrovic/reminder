<script setup>
import { Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

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
                <Link
                    :href="route('reminders.create')"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors"
                >
                    Create Reminder
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Notes</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="reminder in reminders" :key="reminder.id">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ reminder.title }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-500">{{ reminder.notes }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                :class="{
                                                    'px-2 inline-flex text-xs leading-5 font-semibold rounded-full': true,
                                                    'bg-green-100 text-green-800': reminder.completed_at,
                                                    'bg-yellow-100 text-yellow-800': !reminder.completed_at
                                                }"
                                            >
                                                {{ reminder.completed_at ? 'Completed' : 'Pending' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <Link
                                                :href="route('reminders.edit', reminder.id)"
                                                class="text-blue-600 hover:text-blue-900 mr-4"
                                            >
                                                Edit
                                            </Link>
                                            <Link
                                                :href="route('reminders.destroy', reminder.id)"
                                                method="delete"
                                                as="button"
                                                class="text-red-600 hover:text-red-900"
                                            >
                                                Delete
                                            </Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template> 