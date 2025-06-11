<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
const reminders = usePage().props.reminders;
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
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>


        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <ul v-if="reminders">
                    <li v-for="reminder in reminders" :key="reminder.id">
                        <Link :href="`/toggle-complete/${reminder.id}`" method="post" as="button" :preserve-state="false">X</Link>
                        <span v-text="reminder.title"></span>
                        <span v-text="reminder.completed_at"></span>
                    </li>
                </ul>
            </div>
        </div>


    </AuthenticatedLayout>
</template>
