import { type Ref, watch } from 'vue';

export function useNifFormatter(nif: Ref<string>) {
    watch(nif, (newValue = '') => {
        const digits = newValue.replace(/\D/g, '').slice(0, 9);

        let formatted = '';
        for (let i = 0; i < digits.length; i++) {
            if (i > 0 && i % 3 === 0) {
                formatted += '.';
            }
            formatted += digits[i];
        }

        if (formatted !== newValue) {
            nif.value = formatted;
        }
    });

    const getNumericNif = () => nif.value.replace(/\D/g, '').slice(0, 9);

    const isValidNif = () => getNumericNif().length === 9;

    return {
        getNumericNif,
        isValidNif,
    };
}
