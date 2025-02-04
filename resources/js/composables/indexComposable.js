import { ref } from "vue"
import { useRoute, useRouter } from "vue-router"
import axios from "axios"

export default function indexComposable() {

    const module = ref('')
    const items  = ref([])
    const meta   = ref({})
    const route  = useRoute()
    const router = useRouter()

    const getResults = () => {
        
        return 'hallo form indexComposable'
    }

    const getItems = async (page = route.query.page, query = route.query) => {
        try {

            const response = await axios.get(`/api/${module.value}`, {
                params: { page, ...query },
            });

            items.value = response.data.data;
            meta.value  = response.data.meta;

            console.log('items.... ',items.value);

        } catch (error) {
            console.error('Error items:', error);
        }
    }

    return {
        module,
        items,
        meta,
        // route,
        // router,
        getResults,
        getItems,
    }
}