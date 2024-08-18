<template>
    <div>
        <Select v-model="selectedDocument" editable :options="documents" optionLabel="name" optionValue="name" placeholder="Select a Document" @update:modelValue="addDocument"></Select>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue';

const props = defineProps({
    items: {
        type: Array,
        default: []
    }
})

const emits = defineEmits(['add'])

watch(() => props.items, (value) => {
    documents.value = value
})

const documents = ref(props.items)
const selectedDocument = ref(null)


const addDocument = () => {
    emits('add', selectedDocument.value)
}

</script>