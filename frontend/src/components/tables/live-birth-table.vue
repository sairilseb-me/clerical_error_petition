<template>
    <DataTable>
        <template #header>
            <div class="flex justify-end mb-5">
                <InputText placeholder="Search" class="w-96" />
            </div>
        </template>
        <Column v-for="header in headers" :key="header.field" :header="header.header" :field="header.field"></Column>
    </DataTable>
</template>

<script setup>

const headers = [
    { field: 'filename', header: 'Filename'},
    { field: 'type', header: 'Type'},
    { field: 'date_requested', header: 'Date Requested'},
    { field: 'status', header: 'Status'},
    { field: 'actions', header: 'Actions'}
]
</script>