<script setup>
import Reminder from "@/Components/Reminder.vue";
import draggable from "vuedraggable";
import { useForm } from "@inertiajs/vue3";

const emit = defineEmits(["reminder-click"]);

const props = defineProps({
    board: {
        type: Object,
        required: true,
    },
    heading: {
        type: String,
        default: "Boards",
    },
});

const emitReminderClick = (reminderId) => {
    emit("reminder-click", reminderId);
};

function onDragEnd(e) {
    const updatedOrder = props.board.reminders.map((reminder, index) => ({
        id: reminder.id,
        sort: index,
    }));

    const form = useForm({
        _method: "PATCH",
        reminders: updatedOrder,
    });

    form.post(route("boards.update", props.board.id), {
        preserveState: true,
        preserveScroll: true,
    });
}

function onAdd(e) {
    const reminderId = e.item.getAttribute("data-reminder-id");

    const form = useForm({
        _method: "PATCH",
        id: reminderId,
        board_id: e.to.getAttribute("data-board-id"),
    });

    form.post(route("reminders.update", reminderId), {
        preserveState: true,
        preserveScroll: true,
    });
}
</script>

<template>
    <div
        class="col-span-2 sm:px-6 lg:px-8 bg-white p-6 border border-gray- shadow-sm sm:rounded-lg"
    >
        <h2 class="text-lg font-semibold text-gray-900 mb-4">{{ heading }}</h2>
        <draggable
            :data-board-id="board.id"
            class="dragArea list-group space-y-4"
            :list="board.reminders"
            :animation="150"
            :group="{ name: board.id.toString(), pull: true, put: true }"
            @dragend="onDragEnd"
            @add="onAdd"
            item-key="id"
        >
            <template #item="{ element }">
                <div
                    :data-reminder-id="element.id"
                    class="list-group-item border border-gray-200 rounded-md p-3 bg-white cursor-grab hover:bg-gray-50"
                >
                    <Reminder
                        :id="element.id"
                        :title="element.title"
                        :completed_at="element.completed_at"
                        :groups="element.groups"
                        :board_id="board.id"
                        @reminder-click="emitReminderClick"
                    />
                </div>
            </template>
        </draggable>
    </div>
</template>
