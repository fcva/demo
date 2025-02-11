<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    nombre: '',
    correo: '',
    fecha_nacimiento: '',
    direccion: ''
});

const crearEstudiante = () => {
    form.post(route('estudiantes.store'), {
        onSuccess: () => {
            form.reset(); // Limpia los campos después de enviar el formulario
            mensajeExito.value = 'Estudiante creado con éxito';
            setTimeout(() => mensajeExito.value = '', 3000); // Borra el mensaje después de 3s
        }
    });
};

// Mensaje de éxito
import { ref } from 'vue';
const mensajeExito = ref('');
</script>

<template>
    <div class="max-w-lg mx-auto mt-8 p-6 bg-white shadow-md rounded-md">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Crear Estudiante</h2>

        <!-- Mensaje de éxito -->
        <p v-if="mensajeExito" class="mb-4 text-green-600 font-medium">{{ mensajeExito }}</p>

        <form @submit.prevent="crearEstudiante" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre</label>
                <input v-model="form.nombre" type="text" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                <p v-if="form.errors.nombre" class="text-red-500 text-sm">{{ form.errors.nombre }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Correo</label>
                <input v-model="form.correo" type="email" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                <p v-if="form.errors.correo" class="text-red-500 text-sm">{{ form.errors.correo }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                <input v-model="form.fecha_nacimiento" type="date" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                <p v-if="form.errors.fecha_nacimiento" class="text-red-500 text-sm">{{ form.errors.fecha_nacimiento }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Dirección</label>
                <input v-model="form.direccion" type="text"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                <p v-if="form.errors.direccion" class="text-red-500 text-sm">{{ form.errors.direccion }}</p>
            </div>

            <button type="submit" :disabled="form.processing"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md transition">
                {{ form.processing ? 'Guardando...' : 'Guardar' }}
            </button>
        </form>
    </div>
</template>
