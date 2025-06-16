<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import { ref } from 'vue';

const props = defineProps({
    id: {
        type: Number,
        required: true
    },
    title: {
        type: String,
        required: true
    },
    completed_at: {
        type: String,
        default: null
    }
});

const localTitle = ref(props.title);

const form = useForm({
    title: props.title
});

const handleEnter = () => {
    form.title = localTitle.value;
    form.patch(route('reminders.update', props.id));
};
</script>

<template>
    <div class="flex gap-2">
        <Link tabindex="-1" class="flex items-center gap-2" :href="`/toggle-complete/${id}`" method="post" as="button"
            :preserve-state="false">
        <div :class="!completed_at ? 'border' : ''"
            class="w-5 h-5 rounded border-gray-300 bg-white flex items-center text-xs justify-center">
            <span class="text-lg" v-if="completed_at">✅</span>
        </div>
        </Link>
        <input type="text" v-model="localTitle"
            class="group-hover:underline text-gray-650 border-0 p-0 !outline-none !focus:outline-none focus:ring-0"
            @keyup.enter="handleEnter">
    </div>
</template>
