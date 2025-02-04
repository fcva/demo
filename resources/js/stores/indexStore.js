import { defineStore } from "pinia";
import { ref, computed } from "vue";
import { useRoute, useRouter } from "vue-router";

export const useIndexStore = defineStore('indexStore', () => {

    const route  = useRoute()
    const router = useRouter()
    const module = ref('')
    const items  = ref([])
    const meta   = ref({})

    const count = ref(0)

    const getItems = async (page = route.query.page, query = route.query) => {
        try {

            const response = await axios.get(`/api/${module.value}`, {
                params: { page, ...query },
            });

            items.value = response.data.data;
            meta.value  = response.data.meta;

            // console.log('items.... ',items.value);

        } catch (error) {
            console.error('Error items:', error);
        }
    }

    const increment = () => {

        count.value++
    }

    // Computed para obtener los valores de query en tiempo real
    // const page = computed(() => route.query.page || 1);
    // const search = computed(() => route.query.search || "");

    // Función para actualizar los query params sin recargar la página
    /*const updateQuery = (newParams) => {
        router.push({ query: { ...route.query, ...newParams } });
    };*/

    return {
        module,
        items,
        meta,
        count,
        increment,
        // page,
        // search,
        // updateQuery,
        getItems,
    }
})