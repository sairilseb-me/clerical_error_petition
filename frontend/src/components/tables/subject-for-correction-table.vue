<template>
    <DataTable :value="descriptions" paginator :rows="5">
        <template #header>
                <div class="flex flex-col gap-y-6">
                    <div class="flex justify-end w-30 gap-y-4">
                        <Button label="Add Description" icon="pi pi-fw pi-plus" severity="info" raised @click="showAddNewDescriptionInput = true"></Button>
                    </div>
                    <div v-if="showAddNewDescriptionInput" class="flex flex-col gap-y-6">
                        <div class="grid grid-cols-2 gap-4">
                            <DescriptionSelect @add="description = $event" />
                            <div class="flex gap-x-2">
                                <InputText placeholder="From" v-model="from" />
                                <InputText placeholder="To" v-model="to" />
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <Button label="Cancel" severity="secondary" @click="showAddNewDescriptionInput = false" />
                            <Button label="Add" class="w-[5rem]" @click="addDescription" />
                        </div>
                    </div>
                </div>
            </template>
        <Column v-for="header in headers" :key="header.field" :header="header.header" :field="header.field">
           <template v-if="header.field == 'actions'" #body="{data}">
                <Button icon="pi pi-trash" text class="p-button-rounded p-button-danger p-button-outlined" />
            </template>
        </Column>
    </DataTable>
</template>

<script setup>
import { ref } from 'vue';
import DescriptionSelect from '@/components/selects/description-select.vue';

const descriptions = ref([])
const description = ref('')
const from = ref('')
const to = ref('')
const showAddNewDescriptionInput = ref(false)

const headers = [
    {field: 'description', header: 'Description'},
    {field: 'from', header: 'From'},
    {field: 'to', header: 'To'},
    {field: 'actions', header: 'Actions'}
]

const addDescription = () => {
    descriptions.value.push({
        description: description.value,
        from: from.value,
        to: to.value
    })
    showAddNewDescriptionInput.value = false
    resetInput()
}

const resetInput = () => {
    description.value = ''
    from.value = ''
    to.value = ''
}




</script>