<template>
    <Dialog v-model:visible="visible" modal :style="{ width: '25rem'}" @hide="closeDialog">
        <template #header>
            <h1 class="text-2xl font-semibold">Add Document</h1>
        </template>
        <FloatLabel class="mt-6">
            <InputText id="document" class="w-full" v-model="document"/>
            <label for="document">Document Name</label>
        </FloatLabel>
        <template #footer>
            <div class="flex justify-between w-full">
                <Button label="Cancel" severity="secondary" @click="closeDialog" />
                <Button label="Add" icon="pi pi-fw pi-plus" @click="addDocument" />
            </div>
        </template>
    </Dialog>
</template>

<script setup>
import axios from '@axios';
import { ref, watch } from 'vue';
import { useGlobalToastStore } from '@/store/GlobalToast';


const document = ref('')
const visible = ref(false)
const toast = useGlobalToastStore()

const props = defineProps({
    visible: {
        type: Boolean,
        default: false
    }
})

const emits = defineEmits(['update:visible','add'])

watch(() => props.visible, (value) => {
    visible.value = value
})

const closeDialog = () => {
    emits('update:visible')
    resetInput()
}

const addDocument = () => {
    if (document.value == '') {
        toast.showToast('error', 'Error', 'Document Name is required.')
        return
    }

    axios.post('/documents', {name: document.value})
    .then(response => {
        if (response.status === 200) {
            toast.showToast('success', 'Success', 'Succesffully added document.')
            closeDialog()
        }
    }).catch(error => {
        console.log(error)
        toast.showToast('error', 'Error', 'An error occured.')
    })
}


const resetInput = () => {
    document.value = ''
}


</script>