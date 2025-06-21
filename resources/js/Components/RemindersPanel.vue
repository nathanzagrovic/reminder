<script setup>
import Reminder from "@/Components/Reminder.vue";
import Quickview from "@/Components/Quickview.vue";
import { ref, computed } from 'vue';

const props = defineProps({
    reminders: {
        type: [Array, Object],
    },
    heading: {
        type: String,
        default: 'Reminders',
    },
    groups: {
        type: [Array, Object],
    }
});

const selectedReminderId = ref(null);

const selectedReminder = computed(() => {
    if (!selectedReminderId.value || !props.reminders) return null;
    return props.reminders.find(reminder => reminder.id === selectedReminderId.value);
});

const handleReminderClick = (reminderId) => {
    selectedReminderId.value = reminderId;
};


</script>

<template>
    <div class="w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white p-6 border border-gray- shadow-sm sm:rounded-lg">
            <h2 class="text-xl font-bold mb-4">📋 {{ heading }}</h2>
            <ul class="space-y-3" v-if="reminders">
                <li v-for="reminder in reminders" :key="reminder.id" class="group cursor-pointer">
                    <Reminder :id="reminder.id" :title="reminder.title" :completed_at="reminder.completed_at"
                        :groups="reminder.groups" @reminder-click="handleReminderClick">
                    </Reminder>
                    <div v-if="reminder.groups.length > 0">
                        <ul class="flex gap-1 flex-wrap cursor-default leading-none">
                            <li v-for="(group, index) in reminder.groups" :key="group.id">
                                <span class="text-xs text-gray-500">{{ group.name }} <span
                                        v-if="index !== reminder.groups.length - 1">•</span> </span>
                            </li>
                        </ul>
                    </div>
                    <div class="leading-none" v-else>
                        <span class="text-xs text-gray-500">Uncategorized</span>
                    </div>
                </li>
            </ul>
        </div>

        <Quickview v-if="selectedReminder" :reminder="selectedReminder" :groups="groups" />
    </div>
</template>
