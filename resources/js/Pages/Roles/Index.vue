<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';

import indexComposable from '@/composables/indexComposable';

const { getResults } = indexComposable()
const page = usePage();

defineProps({
    msg: {
        type: String
    }
})

</script>

<template>
    <Head title="roles"></Head>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ msg }}
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- <p>Contador: {{ index.count }}</p>
                        <button @click="index.increment">Incrementar</button> -->
                    </div>
                </div>

                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- {{ getResults() }} -->
                          {{ $page }}
                            
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>