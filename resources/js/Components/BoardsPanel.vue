<script setup>
import Reminder from "@/Components/Reminder.vue";
import draggable from 'vuedraggable';

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

const log = (event) => {
    console.log(event);
};

</script>

<template>
    <div :data-board-id="board.id"
        class="col-span-2 sm:px-6 lg:px-8 bg-white p-6 border border-gray- shadow-sm sm:rounded-lg">
        <draggable class="dragArea list-group" :list="board.reminders"
            :group="{ name: 'people', pull: 'clone', put: false }" @dragend="log" item-key="id">
            <template #item="{ element }">
                <div class="list-group-item">
                    <Reminder :id="element.id" :title="element.title" :completed_at="element.completed_at"
                        :groups="element.groups" @reminder-click="test" />
                </div>
            </template>
        </draggable>
    </div>
</template>
