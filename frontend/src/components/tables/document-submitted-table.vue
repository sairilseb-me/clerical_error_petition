<template>
    <div>
        <DataTable :value="documentLists" paginator :rows="5">
            <template #header>
                <div class="flex justify-between">
                    <div class="flex gap-x-1">
                        <DocumentSelect :items="documents" @add="selectedDocument = $event"></DocumentSelect>
                        <Button icon="pi pi-fw pi-plus" text @click="showAddNewDocumentDialog =  true"></Button>
                    </div>
                    <Button label="Add Document" icon="pi pi-fw pi-plus" severity="info" @click="addDocument"></Button>
                </div>
            </template>
            <Column field="document" header="Document" style="width: 75%"></Column>
            <Column field="actions" header="Actions">
                <template #body="{data}">
                    <Button icon="pi pi-trash" text class="p-button-rounded p-button-danger p-button-outlined" @click="(removeDocument(data.id))"></Button>
                </template>
            </Column>
        </DataTable>
        <DocumentDialog :visible="showAddNewDocumentDialog" @update:visible="closeAddNewDocumentDialog"></DocumentDialog>
    </div>
    
</template>

<script setup>
import {onMounted, ref} from 'vue';
import DocumentSelect from '@/components/selects/document-select.vue';
import DocumentDialog from '@/components/dialogs/document-dialog.vue';
import axios from '@axios';

const documents = ref([])
const documentLists = ref([])
const selectedDocument = ref(null)

const showAddNewDocumentDialog = ref(false)

const getDocuments = () => {
    axios.get('/documents')
    .then(response => {
        documents.value = response.data.documents
    }).catch(error => {
        console.log(error)
    })
}

const addDocument = () => {
    documentLists.value.push({id: documentLists.value.length + 1 , document: selectedDocument.value})
    resetInput()
}

const closeAddNewDocumentDialog = () => {
    showAddNewDocumentDialog.value = false
    getDocuments()
}

const removeDocument = (id) => {
    documentLists.value = documentLists.value.filter(document => document.id !== id)
}

onMounted(() => {
    getDocuments()
})

const resetInput = () => {
    selectedDocument.value = null
}

</script>