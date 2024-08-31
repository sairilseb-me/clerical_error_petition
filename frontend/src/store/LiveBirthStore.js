import { defineStore } from "pinia";

export const useLiveBirthStore = defineStore('liveBirth', {
    state: () => ({
        petitioner: '',
        address: '',
        isOwner: true,
        documentOwner: '',
        relationshipToOwner: '',
        ownerDateOfBirth: '',
        placeOfBirth: '',
        registryNumber: '',
        dateReceived: '',
        postingPeriod: '',
        ORNumber: '',
        ORDate: '',
        amountPaid: 0,
        correcttionList: [],
        documentList: [],
        actionTaken: '',
    }),

    getters: {
        getStateData: (state) => {
            return {
                petitioner: state.petitioner,
                address: state.address,
                isOwner: state.isOwner,
                documentOwner: state.documentOwner,
                relationshipToOwner: state.relationshipToOwner,
                ownerDateOfBirth: state.ownerDateOfBirth,
                placeOfBirth: state.placeOfBirth,
                registryNumber: state.registryNumber,
                dateReceived: state.dateReceived,
                postingPeriod: state.postingPeriod,
                ORNumber: state.ORNumber,
                ORDate: state.ORDate,
                amountPaid: state.amountPaid,
                correcttionList: state.correcttionList,
                documentList: state.documentList,
                actionTaken: state.actionTaken,
                };
            }
        },
    
    });