<script setup>
import Reminder from "@/Components/Reminder.vue";

defineProps({
    reminders: {
        type: [Array, Object],
    },
    heading: {
        type: String,
        default: 'Reminders',
    }
});
</script>

<template>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold mb-2">📋 {{ heading }}</h2>
            <div class="grid grid-cols-2">
                <div class="overflow-hidden bg-white p-6 border border-gray- shadow-sm sm:rounded-lg">
                    <ul class="space-y-2" v-if="reminders">
                        <li v-for="reminder in reminders" :key="reminder.id" class="group cursor-pointer">
                            <Reminder :id="reminder.id" :title="reminder.title" :completed_at="reminder.completed_at"></Reminder>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
