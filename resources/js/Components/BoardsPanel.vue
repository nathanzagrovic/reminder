<script setup>
import Reminder from "@/Components/Reminder.vue";
import draggable from 'vuedraggable';
import { useForm } from '@inertiajs/vue3';

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

function onDragEnd() {
    const updatedOrder = props.board.reminders.map((reminder, index) => ({
        id: reminder.id,
        sort: index
    }))

    const form = useForm({
        _method: 'PATCH',
        reminders: updatedOrder
    });

    form.post(route('boards.update', props.board.id), {
        preserveState: true,
        preserveScroll: true,
    });

}

</script>

<template>
    <div :data-board-id="board.id"
        class="col-span-2 sm:px-6 lg:px-8 bg-white p-6 border border-gray- shadow-sm sm:rounded-lg">
        <draggable class="dragArea list-group space-y-4" :list="board.reminders"
            :group="{ name: 'people', pull: 'clone', put: false }" @dragend="onDragEnd" item-key="id">
            <template #item="{ element }">
                <div
                    class="list-group-item border border-gray-200 rounded-md p-3 bg-white cursor-grab hover:bg-gray-50">
                    <Reminder :id="element.id" :title="element.title" :completed_at="element.completed_at"
                        :groups="element.groups" @reminder-click="test" />
                </div>
            </template>
        </draggable>
    </div>
</template>
