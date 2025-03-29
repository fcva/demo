import { useModalStore } from "@/stores/modalStore.js";

export function useModal() {

    const modalStore = useModalStore()

    const openModal = (title, body, action) => {
        
        modalStore.openModal(title, body, action)
    }

    const closeModal = () => {
        
        modalStore.closeModal()
    }

    return {
        modalStore,
        openModal,
        closeModal,
    }
}