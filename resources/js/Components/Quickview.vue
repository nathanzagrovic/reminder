<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    reminder: {
        type: Object,
        required: true
    },
    groups: {
        type: Array,
        required: true
    }
});

const form = useForm({
    reminder_id: props.reminder?.id,
    group_id: ''
});

const handleGroupChange = (event) => {
    form.group_id = event.target.value;
    form.reminder_id = props.reminder.id;

    form.post(route('reminders.add-to-group', { reminder: props.reminder.id }), {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
            form.group_id = '';
            event.target.value = '';
        }
    });
};
</script>

<template>
    <transition name="slide">
        <div v-if="reminder" class="fixed right-0 inset-y-0 bg-white shadow-xl w-1/3">
            <div class="p-6">
                <span class="2xl:text-3xl text-2xl font-bold">{{ reminder.title }}</span>
                <div class="text-sm text-gray-500">
                    <span class="text-gray-500"> {{ reminder.completed_at }}</span>
                </div>
                <div class="text-sm text-gray-500">xx</div>
                <ul class="mt-4 flex gap-3 flex-wrap cursor-default">
                    <li v-for="group in reminder.groups" :key="group.id">
                        <span class="text-sm text-gray-500 border p-3 rounded-md">{{ group.name }}</span>
                    </li>
                </ul>
            </div>

            <div class="p-6">
                <span class="text-sm text-gray-500 block mb-2">Select a group to add this reminder to</span>
                <select name="" id="" @change="handleGroupChange" class="w-full border border-gray-300 rounded-md p-2">
                    <option value="">Select a group...</option>
                    <option :disabled="reminder.groups.some(g => g.id === group.id)" v-for="group in groups"
                        :key="group.id" :value="group.id">{{ group.name }}</option>
                </select>
            </div>
        </div>
    </transition>
</template>

<style scoped>
/* .slide-enter-active {
    transition: all 0.6s ease-out;
}

.slide-leave-active {
    transition: all 0.3s ease-in;
}

.slide-enter-from {
    transform: translateX(100%);
    opacity: 0;
}

.slide-leave-to {
    transform: translateX(100%);
    opacity: 0;
} */
</style>
