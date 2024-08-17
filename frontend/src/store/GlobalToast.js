import { defineStore } from "pinia";
import { useToast } from "primevue/usetoast";

export const useGlobalToastStore = defineStore('toast', () => {
    const toast = useToast();

    function showToast(severity, summary, detail) {
        toast.add({severity: severity, summary: summary, detail: detail, life: 3000},);
    }

    return {
        showToast
    };

});