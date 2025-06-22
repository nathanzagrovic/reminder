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
    },
    groups: {
        type: Array,
        default: []
    }
});

const emit = defineEmits(['reminder-click']);

const localTitle = ref(props.title);

const form = useForm({
    _method: 'PATCH',
    title: props.title
});

const handleEnter = () => {
    form.title = localTitle.value;
    form.post(route('reminders.update', props.id), {
        preserveState: true,
        preserveScroll: true,
    });
};

const handleInfoClick = () => {
    emit('reminder-click', props.id);
};

const handleDragEnd = () => {
    console.log('drag end');
};
</script>

<template>
    <div>
        <div class="flex gap-2 justify-between">

            <div class="flex items-center gap-2">
                <Link tabindex="-1" class="flex items-center gap-2" :href="`/toggle-complete/${id}`" method="post"
                    as="button" :preserve-state="false">
                <div :class="!completed_at ? 'border' : ''"
                    class="w-5 h-5 rounded border-gray-300 bg-white flex items-center text-xs justify-center">
                    <span class="text-lg" v-if="completed_at">✅</span>
                </div>
                </Link>
                <input type="text" v-model="localTitle"
                    class="group-hover:underline text-gray-650 border-0 p-0 !outline-none !focus:outline-none focus:ring-0"
                    @keyup.enter="handleEnter" @dragend="handleDragEnd">
            </div>

            <div class="w-6 h-6 flex items-center justify-center text-xs font-bold bg-gray-100 text-gray-400 rounded-full"
                @click="handleInfoClick">i</div>
        </div>
        <div v-if="groups.length > 0">
            <ul class="flex gap-1 flex-wrap cursor-default leading-none">
                <li v-for="(group, index) in groups" :key="group.id">
                    <span class="text-xs text-gray-500">{{ group.name }}</span>
                </li>
            </ul>
        </div>
        <div class="leading-none" v-else>
            <span class="text-xs text-gray-500">Uncategorized</span>
        </div>
    </div>
</template>
