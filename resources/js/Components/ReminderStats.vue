<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    totalReminders: {
        type: Number,
        required: true
    }
});
</script>

<template>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-700">Total Reminders</h2>
                        <p class="text-2xl font-bold text-gray-900">{{ totalReminders }}</p>
                    </div>
                </div>
                <Link 
                    :href="route('reminders.index')"
                    class="text-sm font-medium text-blue-600 hover:text-blue-800"
                >
                    View All →
                </Link>
            </div>
        </div>
    </div>
</template> 