<script setup>
import { defineProps, computed } from 'vue';
import { Link } from '@inertiajs/vue3';

//Definir props con validación de tipo
const props = defineProps({
    estudiante: {
        type: Object,
        required: true
    }
});

// Evitar errores si estudiante es undefined
const estudianteInfo = computed(() => props.estudiante || {});

</script>

<template>
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-teal-600 mb-4">Detalles del Estudiante</h1>

        <div v-if="Object.keys(estudianteInfo).length">
            <p class="text-gray-700"><strong>ID:</strong> {{ estudianteInfo.id }}</p>
            <p class="text-gray-700"><strong>Nombre:</strong> {{ estudianteInfo.nombre }}</p>
            <p class="text-gray-700"><strong>Email:</strong> {{ estudianteInfo.correo }}</p>
            <p class="text-gray-700"><strong>Fecha de Nacimiento:</strong> {{ estudianteInfo.fecha_nacimiento }}</p>
            <p class="text-gray-700"><strong>Dirección:</strong> {{ estudianteInfo.direccion }}</p>
        </div>

        <p v-else class="text-red-500 text-sm">No hay información disponible.</p>

        <!-- Botón para volver -->
        <div class="mt-4">
            <Link :href="route('estudiantes.index')" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                Volver a la lista
            </Link>
        </div>
    </div>
</template>
