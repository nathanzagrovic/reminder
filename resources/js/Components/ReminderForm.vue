<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    reminder: {
        type: Object,
        default: () => ({
            title: '',
            notes: '',
            completed_at: null
        })
    }
});

const form = useForm({
    title: props.reminder.title,
    notes: props.reminder.notes,
    completed_at: props.reminder.completed_at
});

const submit = () => {
    if (props.reminder.id) {
        form.put(route('reminders.update', props.reminder.id));
    } else {
        form.post(route('reminders.store'));
    }
};
</script>

<template>
    <form @submit.prevent="submit" class="space-y-6">
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input
                type="text"
                id="title"
                v-model="form.title"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                required
            />
            <div v-if="form.errors.title" class="mt-1 text-sm text-red-600">
                {{ form.errors.title }}
            </div>
        </div>

        <div>
            <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
            <textarea
                id="notes"
                v-model="form.notes"
                rows="3"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            ></textarea>
            <div v-if="form.errors.notes" class="mt-1 text-sm text-red-600">
                {{ form.errors.notes }}
            </div>
        </div>

        <div class="flex items-center">
            <input
                type="checkbox"
                id="completed"
                v-model="form.completed_at"
                :true-value="new Date().toISOString().split('T')[0]"
                :false-value="null"
                class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
            />
            <label for="completed" class="ml-2 block text-sm text-gray-900">Mark as completed</label>
        </div>

        <div class="flex justify-end">
            <button
                type="submit"
                class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                :disabled="form.processing"
            >
                {{ reminder.id ? 'Update' : 'Create' }} Reminder
            </button>
        </div>
    </form>
</template> 