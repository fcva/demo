import { defineStore } from "pinia";
import { ref } from "vue";

export const useModalStore = defineStore('modal', {

    state: () => ({
        isVisible: false,
        modalContent: {
            title: '',
            body: '',
            action: null
        }
    }),

    actions: {

        openModal(title, body, action = null) {
            this.modalContent = {title, body, action}
            this.isVisible = true
        },

        closeModal() {
            this.isVisible = false,
            this.modalContent = {title: '', body: '', action: null}
        }
    }
})