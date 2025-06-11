<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
const reminders = usePage().props.reminders;
// TODO: Extract reminder wrapper + reminder item to components
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>


        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold mb-2">📋 Reminders</h2>
                <div class="grid grid-cols-2">
                    <div class="overflow-hidden bg-white p-6 border border-gray- shadow-sm sm:rounded-lg">
                    <ul class="space-y-2" v-if="reminders">
                        <li v-for="reminder in reminders" :key="reminder.id" class="group cursor-pointer">
                            <Link class="flex items-center gap-2" :href="`/toggle-complete/${reminder.id}`" method="post" as="button" :preserve-state="false">
                                <div :class="!reminder.completed_at ? 'border' : ''" class="w-5 h-5 rounded border-gray-300 bg-white flex items-center text-xs justify-center">
                                    <span class="text-lg" v-if="reminder.completed_at">✅</span>
                                </div>
                                <span :class="reminder.completed_at ? 'line-through opacity-25' : ''" class="group-hover:underline" v-text="reminder.title"></span>
                                <span v-if="reminder.completed_at" class="text-xs">- Completed on {{ reminder.completed_at }}</span>
                            </Link>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>


    </AuthenticatedLayout>
</template>
