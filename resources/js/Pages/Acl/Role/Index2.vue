<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import { useModal } from '@/composables/useModal';
import { reactive, ref } from 'vue';


const { openModal, closeModal } = useModal()


defineProps({
    message: {
        type: String
    },
    permisos: {
        type: Object
    }
})

const selectedData = reactive({
    nombre: '',
    descripcion: '',
})

const modalAction = ref('')

const showCreateModal = () => {

    modalAction.value = 'create'
    Object.assign(selectedData, {nombre: '', descripcion: ''})
    openModal('Nuevo', '', console.log('created'))
}

const handleCreateSubmit = () => {

    console.log('created submit');
    // closeModal()
}

const handleEditSubmit = () => {
    console.log('edited submit');
    // closeModal()
}

const closeModals = () => {
    closeModal
    console.log('closed');
    
}

</script>

<template>

    <Head title="roles"></Head>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ message }}
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ permisos }}
                    </div>
                </div>

                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <button 
                            class="bg-green-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-none"
                            @click="showCreateModal">
                            Nuevo
                        </button>
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
                                <tr v-for="(item, key) in permisos.data" :key="key">
                                    <td class="border border-gray-300">{{ permisos.meta.from + key }}</td>
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
                    </div>
                </div>
            </div>
        </div>


        <Modal>
            <template #default>
                <div v-if="modalAction === 'create' || modalAction === 'edit' " class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
                    <div class="bg-white w-96 p-6 rounded-lg shadow-lg">
                        <h2 class="text-xl font-semibold mb-4">
                            {{ modalAction === 'create' ? 'Crear Nuevo Registro' : 'Editar Registro' }}
                        </h2>

                        <form @submit.prevent="modalAction === 'create' ? handleCreateSubmit() : handleEditSubmit()">
                            <div class="mb-4">
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                                <input type="text" id="nombre" v-model="selectedData.nombre" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            
                            <div class="mb-4">
                                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                                <textarea id="descripcion" v-model="selectedData.descripcion" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                            </div>
                            
                            <div class="flex justify-end gap-2">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                    {{ modalAction === 'create' ? 'Crear' : 'Actualizar' }}
                                </button>
                                <button 
                                    type="button" class="px-4 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-500"
                                    @click="closeModals()">
                                    Cancelar
                                </button>
                            </div>
                        </form>
                    </div>

                    
                </div>
            </template>
        </Modal>

        


    </AuthenticatedLayout>
</template>