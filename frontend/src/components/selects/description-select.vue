<template>
    <Select v-model="selected" :options="items" editable optionLabel="name" optionValue="name" placeholder="Select the correct Description" @update:modelValue="addDescription"></Select>
</template>


<script setup>
import { ref } from 'vue';
import axios from '@axios'


const selected = ref(null)

const items = ref([])

const emits = defineEmits(['add'])

const getItems = () => {
    axios.get('/descriptions')
    .then(response => {
        items.value = response.data.descriptions
    }).catch(error => {
        console.log(error)
    })
}

const addDescription = () => {
    emits('add', selected.value)
}


getItems()

</script>