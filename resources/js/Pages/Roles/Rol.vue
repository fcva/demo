<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';

import { useIndexStore } from '@/stores/indexStore';
const index = useIndexStore()

index.module = 'roles'
index.getItems()



</script>

<template>

    <Head title="rol"></Head>

    <AuthenticatedLayout>
        
        <!-- <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                rol header
            </h2>
        </template> -->

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <!-- <div class="p-6 text-gray-900">
                        Lista de Roles
                    </div> -->

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> 
                        <div class="p-3 flex justify-start"> 
                            Lista de Roles
                        </div>
                        <div class="p-3 flex justify-end"> 
                            <button class="bg-green-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-none">
                                Nuevo
                            </button>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <table class="table-fixed border-collapse border border-gray-400">
                            <thead class="uppercase bg-blue-50">
                                <tr>
                                    <th class="border border-gray-300">#</th>
                                    <th class="border border-gray-300">nombre</th>
                                    <th class="border border-gray-300">descripcion</th>
                                    <th class="border border-gray-300">estado</th>
                                    <th class="border border-gray-300">ver</th>
                                    <th class="border border-gray-300">editar</th>
                                    <th class="border border-gray-300">eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, key) in index.items" :key="key">
                                    <td class="border border-gray-300">{{ index.meta.from + key }}</td>
                                    <td class="border border-gray-300">{{ item.nombre }}</td>
                                    <td class="border border-gray-300">{{ item.descripcion }}</td>
                                    <td class="border border-gray-300">{{ item.es_activo }}</td>
                                    <td class="border border-gray-300">
                                        <button class="px-2 py-1 text-sm font-medium rounded-md bg-teal-500 text-white hover:bg-blue-700">
                                            ver
                                        </button>
                                    </td>
                                    <td class="border border-gray-300">
                                        <button class="px-2 py-1 text-sm font-medium rounded-md bg-yellow-500 text-white hover:bg-blue-700">
                                            editar
                                        </button>
                                    </td>
                                    <td class="border border-gray-300">
                                        <button class="px-2 py-1 text-sm font-medium rounded-md bg-red-500 text-white hover:bg-blue-700">
                                            eliminar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- {{ index.meta.from }} -->
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>