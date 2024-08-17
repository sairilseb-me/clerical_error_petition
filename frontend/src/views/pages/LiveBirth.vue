<template>
    <div>
        <Card>
            <template #content>
                <div class="flex flex-col px-5 py-5">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl font-semibold">Live Birth</h1>
                        <Button type="button" label="New" icon="pi pi-plus" @click="showAddBirthDialog = true"></Button>
                    </div>
                    <div class="mt-5">
                        <LiveBirthTable />
                    </div>
                </div> 
            </template>
        </Card>
        <LiveBirthDialog :visible="showAddBirthDialog" @close="closeAddBirthDialog" />
    </div>
</template>


<script setup>
import LiveBirthTable from '@/components/tables/live-birth-table.vue';
import LiveBirthDialog from '@/components/dialogs/live-birth-dialog.vue';

import {ref} from 'vue'

const showAddBirthDialog = ref(false)


const closeAddBirthDialog = () => {
    showAddBirthDialog.value = false
}

</script>