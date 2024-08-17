<template>
    <Dialog v-model:visible="visible" :style="{width: '25rem'}" @hide="closeDialog">
        <template #header>
            <h1 class="text-2xl font-semibold">Add Description</h1>
        </template>
        <FloatLabel class="mt-6">
            <InputText id="description" class="w-full" v-model="description"/>
            <label for="description">Description</label>
        </FloatLabel>
        <template #footer>
            <div class="flex justify-between w-full">
                <Button label="Cancel" severity="secondary" @click="closeDialog" />
                <Button label="Add" icon="pi pi-fw pi-plus" @click="addDescription" />
            </div>
        </template> 
    </Dialog>
</template>

<script setup>
import axios from '@axios';
import { ref, watch } from 'vue';
import {useGlobalToastStore} from '@/store/GlobalToast';
 
const props = defineProps({
    visible: {
        type: Boolean,
        default: false
    }
})

const toast = useGlobalToastStore()

const visible = ref(false)
const description = ref('')
const emits = defineEmits(['update:visible'])

watch(() => props.visible, (value) => {
    visible.value = value
})

const addDescription = () => {
    if (description.value == '') {
        toast.showToast('error', 'Error', 'Description is required.')
        return
    }

    axios.post('/descriptions', {name: description.value})
    .then(response => {
        if (response.status === 200) {
            toast.showToast('success', 'Success', 'Succesffully added description.')
            closeDialog()
        }
    }).catch(error => {
        console.log(error)
    })
}

const closeDialog = () => {
    emits('update:visible')
    resetInput()
}

const resetInput = () => {
    description.value = ''
}
</script>