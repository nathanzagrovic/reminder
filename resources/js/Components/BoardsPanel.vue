<script setup>
import Reminder from "@/Components/Reminder.vue";

const emit = defineEmits(['reminder-click']);

const props = defineProps({
    board: {
        type: Object,
        required: true
    },
    heading: {
        type: String,
        default: 'Boards',
    }
});

const test = (reminderId) => {
    emit('reminder-click', reminderId);
};

</script>

<template>
    <div :data-board-id="board.id" class="col-span-2">
        <div class="w-full">
            <div class="overflow-hidden bg-white p-6 border border-gray- shadow-sm sm:rounded-lg">
                <h2 class="text-xl font-bold mb-4">📋 {{ heading }}</h2>
                <ul class="space-y-3" v-if="board.reminders">
                    <!-- TODO: Make this draggable board to board -->
                    <li v-for="reminder in board.reminders" :key="reminder.id" class="group cursor-pointer">
                        <Reminder :id="reminder.id" :title="reminder.title" :completed_at="reminder.completed_at"
                            :groups="reminder.groups" @reminder-click="test">
                        </Reminder>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
