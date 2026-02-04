<template>
    <Dialog 
        v-model:visible="visible" 
        :style="{ width: '450px' }" 
        header="Permisos de Usuario" 
        :modal="true"
        @hide="onHide"
    >
        <div class="flex flex-col gap-4">
            <div v-if="user">
                <p class="mb-2">Gestionando accesos para:</p>
                <div class="p-3 bg-gray-100 rounded-lg">
                    <p class="font-bold text-lg">{{ user.name }}</p>
                    <p class="text-sm text-gray-600">{{ user.email }}</p>
                </div>
            </div>

            <div class="py-10 text-center border-2 border-dashed border-gray-300 rounded mt-4">
                <i class="pi pi-lock text-3xl text-gray-400 mb-2"></i>
                <p class="text-gray-500 italic">La lógica de permisos se implementará aquí.</p>
            </div>
        </div>

        <template #footer>
            <Button label="Cerrar" icon="pi pi-times" text @click="visible = false" />
            <Button label="Guardar Cambios" icon="pi pi-check" severity="success" @click="handleSave" />
        </template>
    </Dialog>
</template>

<script setup>
import { ref, watch } from 'vue';

const props = defineProps({
    modelValue: Boolean, // Controla la visibilidad
    user: Object         // El usuario seleccionado
});

const emit = defineEmits(['update:modelValue', 'save']);

// Sincronizamos el estado interno con el v-model del padre
const visible = ref(props.modelValue);

watch(() => props.modelValue, (newVal) => {
    visible.value = newVal;
});

watch(visible, (newVal) => {
    emit('update:modelValue', newVal);
});

const onHide = () => {
    visible.value = false;
};

const handleSave = () => {
    // Por ahora solo emitimos el evento y cerramos
    emit('save', props.user);
    visible.value = false;
};
</script>