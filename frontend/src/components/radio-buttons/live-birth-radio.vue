<template>
    <div class="flex flex-wrap gap-3">
        <div class="flex items-center">
            <RadioButton inputId="ingredient1" name="Own Birth Certificate" v-model="selected" value="own" @update:modelValue="updateValue" />
            <label for="ingredient1" class="ml-2">Own Birth Certificate</label>
        </div>
        <div class="flex items-center">
            <RadioButton  inputId="ingredient2" name="For Another" v-model="selected" value="another" @update:modelValue="updateValue" />
            <label for="ingredient2" class="ml-2">For Another</label>
        </div>
    </div>
</template>


<script setup>
import {defineProps, defineEmits} from 'vue';
import {ref} from 'vue';

const props = defineProps({
    value: {
        type: String,
        default: ''
    }
})

const selected = ref(props.value)


const emits = defineEmits(['update:modelValue'])

const updateValue = () => {
    emits('update:modelValue', selected.value)
}



</script>