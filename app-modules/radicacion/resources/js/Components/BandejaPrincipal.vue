<template>
  <div class="flex flex-col">
    <div class="flex overflow-hidden">
      <main class="flex-1 p-8 overflow-y-auto">
        <div class="bg-white shadow-md rounded-lg p-4">
          <DataTable 
            :value="radicados.data" 
            :rows="10" 
            stripedRows 
            responsiveLayout="scroll"
            class="p-datatable-sm"
          >
            <template #empty>
              <div class="text-center p-4">No se encontraron radicados en su bandeja.</div>
            </template>

            <Column field="numero_radicado" header="Nro. Radicado" sortable class="font-bold text-blue-600">
              <template #body="slotProps">
                <span class="font-mono">{{ slotProps.data.numero_radicado }}</span>
              </template>
            </Column>

            <Column field="asunto" header="Asunto" :style="{ minWidth: '300px' }">
              <template #body="slotProps">
                <div class="truncate w-80" :title="slotProps.data.asunto">
                  {{ slotProps.data.asunto }}
                </div>
              </template>
            </Column>

            <Column field="tipo.nombre" header="Tipo">
              <template #body="slotProps">
                <Tag :value="slotProps.data.tipo?.nombre" severity="info" />
              </template>
            </Column>

            <Column field="fecha_radicado" header="Fecha de Radicación" sortable>
              <template #body="slotProps">
                {{ format(new Date(slotProps.data.fecha_radicado), 'dd/MM/yyyy HH:mm') }}
              </template>
            </Column>

            <Column header="Acciones" class="text-center">
              <template #body="slotProps">
                <div class="flex gap-2 justify-center">
                  <Button icon="pi pi-eye" class="p-button-rounded p-button-text" v-tooltip="'Ver Detalle'" />
                  <Button icon="pi pi-file-pdf" class="p-button-rounded p-button-text p-button-danger" v-tooltip="'Ver Documento'" />
                  <Button icon="pi pi-history" class="p-button-rounded p-button-text p-button-help" v-tooltip="'Ver Trazabilidad'" />
                </div>
              </template>
            </Column>
          </DataTable>
          
          <div class="mt-4 flex justify-end">
             <p class="text-sm text-gray-500">Mostrando {{ radicados.from }} a {{ radicados.to }} de {{ radicados.total }} registros</p>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script setup>

defineProps({
    radicados: Object
});
</script>

<style scoped>
/* Ajustes para que PrimeVue combine mejor con Tailwind */
:deep(.p-datatable-thead > tr > th) {
  background-color: #f8fafc;
  color: #475569;
}
</style>