<template>
    <div>
        <Card>
            <template #content>
                <div class="flex flex-col px-5 py-5">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl font-semibold">Live Birth</h1>
                        <Button type="button" label="New" icon="pi pi-plus"></Button>
                    </div>
                    <div class="mt-5">
                        <LiveBirthTable />
                    </div>
                </div> 
            </template>
        </Card>
    </div>
</template>


<script setup>
import LiveBirthTable from '@/components/tables/live-birth-table.vue';
</script>