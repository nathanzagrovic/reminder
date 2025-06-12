<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    id: {
        type: Number,
    },
    title: {
        type: String,
    },
    completed_at: {
        type: Date,
    }
});
</script>

<template>
    <Link class="flex items-center gap-2" :href="`/toggle-complete/${this.id}`" method="post" as="button" :preserve-state="false">
        <div :class="!this.completed_at ? 'border' : ''" class="w-5 h-5 rounded border-gray-300 bg-white flex items-center text-xs justify-center">
            <span class="text-lg" v-if="this.completed_at">✅</span>
        </div>
        <span :class="this.completed_at ? 'line-through opacity-25' : ''" class="group-hover:underline text-gray-650" v-text="this.title"></span>
        <span style="display: none" v-if="this.completed_at" class="text-xs">- Completed on {{ this.completed_at }}</span>
    </Link>
</template>
