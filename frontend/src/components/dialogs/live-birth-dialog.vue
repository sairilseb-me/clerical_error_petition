<template>
    <Dialog v-model:visible="visible" modal header="Add Live Birth Petition" :style="{ width: '70rem'}" @hide="closeDialog">
        <Stepper value="1">
            <StepList>
                <Step value="1">Petition Data</Step>
                <Step value="2">Document Owner's Data</Step>
                <Step value="3">Payment Data</Step>
                <Step value="4">Subject for Correction</Step>
            </StepList>
            <StepPanels>
                <StepPanel v-slot="{ activateCallback }" value="1">
                    <div class="flex flex-col mb-6">
                        <div class="flex flex-col gap-y-6">
                            <FloatLabel>
                                <InputText id="petitioner" class="w-full"/>
                                <label for="petitioner">Petitioner</label>
                            </FloatLabel>
                            <FloatLabel>
                                <InputText id="address" class="w-full"/>
                                <label for="address">Address</label>
                            </FloatLabel>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <Button label="Next" icon="pi pi-arrow-right" iconPos="right" @click="activateCallback('2')" />
                    </div>
                </StepPanel>
                <StepPanel v-slot="{ activateCallback }" value="2">
                    <div class="flex flex-col gap-y-6">
                        <LiveBirthRadio @update:modelValue="selectedOption" />
                        <FloatLabel v-if="petitionFor == 'another'">
                            <InputText id="relationship" class="w-full"/>
                            <label for="relationship">Relationship to the document Owner</label>
                        </FloatLabel>
                        <DatePicker showIcon fluid iconDisplay="input" placeholder="Date of Birth of Document Owner"></DatePicker>
                        <div>
                            <FloatLabel>
                                <InputText id="pob" class="w-full"/>
                                <label for="pob">Place of Birth</label>
                            </FloatLabel>
                            <div class="flex justify-center">
                                <small class="text-surface-500 dark:text-surface-400">(City, Province, Country)</small>
                            </div>
                        </div>
                    </div>
                    <div class="flex pt-6 justify-between">
                        <Button label="Back" severity="secondary" icon="pi pi-arrow-left" @click="activateCallback('1')" />
                        <Button label="Next" icon="pi pi-arrow-right" iconPos="right" @click="activateCallback('3')" />
                    </div>
                </StepPanel>
                <StepPanel v-slot="{ activateCallback }" value="3">
                    <div class="flex flex-col gap-y-6">
                        <FloatLabel>
                            <InputText id="registry-num" class="w-full"/>
                            <label for="registry-num">Registry Number</label>
                        </FloatLabel>
                        <DatePicker showIcon fluid iconDisplay="input" placeholder="Date Received"></DatePicker>
                        <DatePicker showIcon fluid iconDisplay="input" placeholder="Posting Period"></DatePicker>
                        <FloatLabel>
                            <InputText id="order-num" class="w-full"/>
                            <label for="order-num">Order Number</label>
                        </FloatLabel>
                        <DatePicker showIcon fluid iconDisplay="input" placeholder="Order Date"></DatePicker>
                        <InputGroup>
                            <InputGroupAddon>
                                <span>₱</span>
                            </InputGroupAddon>
                            <InputText id="amount" class="w-full" placeholder="Enter Amount"/>
                        </InputGroup>
                    </div>
                    <div class="pt-6 flex justify-between">
                        <Button label="Back" severity="secondary" icon="pi pi-arrow-left" @click="activateCallback('2')" />
                        <Button label="Next" icon="pi pi-arrow-right" iconPos="right" @click="activateCallback('4')" />
                    </div>
                </StepPanel>
                <StepPanel v-slot="{activateCallback}" value="4">
                    <div class="flex flex-col">
                        <div>
                            <SubjectForCorrectionTable />
                        </div>
                        <div class="pt-6 flex justify-between">
                            <Button label="Back" severity="secondary" icon="pi pi-arrow-left" @click="activateCallback('3')" />
                            <Button label="Next" icon="pi pi-arrow-right" iconPos="right" @click="activateCallback('4')" />
                        </div>
                    </div>
                </StepPanel>
            </StepPanels>
        </Stepper>
    </Dialog>
</template>

<script setup>
import LiveBirthRadio from '@/components/radio-buttons/live-birth-radio.vue';
import SubjectForCorrectionTable from '@/components/tables/subject-for-correction-table.vue';
import { defineProps, defineEmits } from 'vue';
import { ref, watch } from 'vue';

const props = defineProps({
    visible: {
        type: Boolean,
        default: false
    }
})

const emits = defineEmits(['close'])

const visible = ref(false)
const petitionFor = ref('')


watch(() => props.visible, (value) => {
    visible.value = value
})

const selectedOption = (value) => {
    petitionFor.value = value
}

const closeDialog = () => {
    emits('close')
}

</script>