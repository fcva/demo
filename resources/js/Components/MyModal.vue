<script setup>
import { useModal } from '@/composables/useModal';

const { modalStore, closeModal } = useModal();

const props = defineProps({
    onConfirm:{
        Function
    }
})

const executeAction = () => {
    if (modalStore.modalContent.action) {
        modalStore.modalContent.action();
        closeModal();
    }
}

const confirmAction = () => {
    console.log('I am using confirmAction');
};
</script>

<template>
    <Transition name="modal-transition">
        <div v-if="modalStore.isVisible" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white w-3/4 md:w-1/2 lg:w-1/3 p-6 rounded-lg shadow-xl">
                <!-- <div class="flex justify-between items-center border-b pb-2">
                    <h2 class="text-lg font-bold text-gray-800">{{ modalStore.modalContent.title }}</h2>
                    <button type="button" class="text-gray-600 hover:text-gray-900" @click="closeModal">✖</button>
                </div> -->
                <div class="py-4">
                    <slot></slot>
                </div>
                <!-- <div class="flex justify-end gap-2 border-t pt-3">
                    <button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400" @click="closeModal">Cancelar</button>
                    <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700" @click="executeAction" v-if="modalStore.modalContent.action">Confirmar</button>
                </div> -->
            </div>
        </div>
    </Transition>
</template>

<style scoped>
    .modal-transition-enter-active,
    .modal-transition-leave-active {
        transition: opacity 0.4s;
    }
    .modal-transition-enter-from,
    .modal-transition-leave-to {
        opacity: 0;
    }
</style>