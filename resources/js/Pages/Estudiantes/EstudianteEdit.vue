<script setup>
import { defineProps, reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';

// Recibir datos del estudiante
const props = defineProps({
    estudiante: Object
});

// Crear un formulario reactivo con los datos actuales del estudiante
const form = useForm({
    nombre: props.estudiante.nombre,
    correo: props.estudiante.correo,
    fecha_nacimiento: props.estudiante.fecha_nacimiento,
    direccion: props.estudiante.direccion || ''
});

// Función para enviar la actualización
const actualizarEstudiante = () => {
    form.put(route('estudiantes.update', props.estudiante.id), {
        onSuccess: () => alert('Estudiante actualizado con éxito')
    });
};
</script>

<template>
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-teal-600 mb-4">Editar Estudiante</h1>

        <form @submit.prevent="actualizarEstudiante">
            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Nombre</label>
                <input v-model="form.nombre" type="text" class="w-full p-2 border rounded-md">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Correo</label>
                <input v-model="form.correo" type="email" class="w-full p-2 border rounded-md">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Fecha de Nacimiento</label>
                <input v-model="form.fecha_nacimiento" type="date" class="w-full p-2 border rounded-md">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium">Dirección</label>
                <input v-model="form.direccion" type="text" class="w-full p-2 border rounded-md">
            </div>

            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                Guardar Cambios
            </button>
        </form>

        <div class="mt-4">
            <Link :href="route('estudiantes.index')" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                Cancelar
            </Link>
        </div>
    </div>
</template>
