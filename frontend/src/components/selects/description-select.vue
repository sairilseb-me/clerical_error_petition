<template>
    <Select v-model="selected" :options="items" editable optionLabel="name" optionValue="name" placeholder="Select the correct Description" @update:modelValue="addDescription"></Select>
</template>


<script setup>
import { ref, watch } from 'vue';

const selected = ref(null)


const props = defineProps({
    items: {
        type: Array,
        default: []
    }
})

const items = ref(props.items)

watch(() => props.items, (value) => {
    items.value = value
})  

const emits = defineEmits(['add'])

const addDescription = () => {
    emits('add', selected.value)
}


</script>