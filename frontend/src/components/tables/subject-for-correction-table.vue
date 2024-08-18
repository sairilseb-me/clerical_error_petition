<template>
    <div>
        <DataTable :value="descriptions" paginator :rows="5">
            <template #header>
                    <div class="flex flex-col gap-y-6">
                        <div class="flex justify-end w-30 gap-y-4">
                            <Button label="Add Description" icon="pi pi-fw pi-plus" severity="info" @click="showAddNewDescriptionInput = true"></Button>
                        </div>
                        <div v-if="showAddNewDescriptionInput" class="flex flex-col gap-y-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex gap-x-1">   
                                    <DescriptionSelect :items="descriptionItems" class="grow" @add="description = $event" />
                                    <Button icon="pi pi-fw pi-plus" text @click="showAddNewDescriptionDialog = true"></Button>
                                </div>
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
                    <Button icon="pi pi-trash" text class="p-button-rounded p-button-danger p-button-outlined" @click="(removeDescription(data.id))" />
                </template>
            </Column>
        </DataTable>
        <DescriptionDialog :visible="showAddNewDescriptionDialog" @update:visible="closeAddNewDescriptionDialog"></DescriptionDialog>
    </div>
    
</template>

<script setup>
import { onMounted, ref } from 'vue';
import DescriptionSelect from '@/components/selects/description-select.vue';
import DescriptionDialog from '@/components/dialogs/description-dialog.vue';
import axios from '@axios';

const descriptions = ref([])
const description = ref('')
const from = ref('')
const to = ref('')
const showAddNewDescriptionInput = ref(false)
const showAddNewDescriptionDialog = ref(false)
const descriptionItems = ref([])

const headers = [
    {field: 'description', header: 'Description'},
    {field: 'from', header: 'From'},
    {field: 'to', header: 'To'},
    {field: 'actions', header: 'Actions'}
]

// add data to descriptions to be displayed in the table
const addDescription = () => {
    descriptions.value.push({
        id: descriptions.value.length + 1,
        description: description.value,
        from: from.value,
        to: to.value
    })
    showAddNewDescriptionInput.value = false
    resetInput()
}

const removeDescription = (id) => {
    descriptions.value = descriptions.value.filter((description) => description.id !== id)
}

// get descriptions from the database
const getDescriptionItems = () => {
    axios.get('/descriptions')
    .then(response => {
        descriptionItems.value = response.data.descriptions
    }).catch(error => {
        console.log(error)
    })
}

// close dialog of adding new description
const closeAddNewDescriptionDialog = () => {
    showAddNewDescriptionDialog.value = false
    getDescriptionItems()
}   

const resetInput = () => {
    description.value = ''
    from.value = ''
    to.value = ''
}

getDescriptionItems()

</script>