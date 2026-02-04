<!-- <template>
  <div class="flex flex-col h-screen">
    <Navbar />
    <div class="flex flex-1">
      <Sidebar />
      <main class="flex-1 p-8">
        <h2 class="text-2xl font-semibold">Bandeja de entrada</h2>
        <p class="mt-2 text-gray-600">
          Gestione sus correspondencias aquí
        </p>
        <Divider/>
        <div class="flex flex-row justify-center">
          
        </div>
      </main>
    </div>
  </div>
</template>

<script setup>
import Sidebar from '@/Components/Sidebar.vue';
import Navbar from '@/Components/Navbar.vue';

</script>
 -->


 <template>
  <div class="flex flex-col h-screen bg-slate-50">
    <Navbar />
    <div class="flex flex-1 overflow-hidden">
      <Sidebar />
      <main class="flex-1 p-6 overflow-y-auto">
        <h2 class="text-2xl font-semibold">Bandeja de entrada</h2>
        <p class="mt-2 text-gray-600">
          Gestione sus correspondencias aquí
        </p>
        <Divider />

        <Toolbar class="mb-4 !bg-transparent !border-none !p-0">
          <template #start>
            <div class="flex items-center gap-2">
              <Button icon="pi pi-refresh" variant="text" rounded severity="secondary" v-tooltip.bottom="'Actualizar'" />
              
              <div v-if="selectedEmails.length > 0" class="flex items-center gap-1 animate-fadein">
                <Divider layout="vertical" />
                <Button icon="pi pi-inbox" variant="text" rounded severity="secondary" v-tooltip.bottom="'Archivar'" />
                <Button icon="pi pi-exclamation-circle" variant="text" rounded severity="secondary" v-tooltip.bottom="'Marcar como spam'" />
                <Button icon="pi pi-trash" variant="text" rounded severity="danger" v-tooltip.bottom="'Eliminar'" @click="deleteSelected" />
                <Button icon="pi pi-envelope" variant="text" rounded severity="secondary" v-tooltip.bottom="'Marcar como leído'" />
              </div>
            </div>
          </template>

          <template #end>
            <div class="flex items-center gap-2 text-sm text-gray-500">
              <span>1-{{ emails.length }} de {{ emails.length }}</span>
              <Button icon="pi pi-chevron-left" variant="text" rounded severity="secondary" size="small" />
              <Button icon="pi pi-chevron-right" variant="text" rounded severity="secondary" size="small" />
            </div>
          </template>
        </Toolbar>

        <div class="border border-zinc-200 dark:border-zinc-200 rounded-lg overflow-hidden shadow-sm">
          <DataTable 
            :value="emails" 
            v-model:selection="selectedEmails" 
            dataKey="id"
            rowHover 
            class="p-datatable-sm"
          >
            <Column selectionMode="multiple" headerStyle="width: 3rem"></Column>
            
            <Column headerStyle="width: 3rem">
              <template #body="slotProps">
                <Button 
                    :icon="slotProps.data.starred ? 'pi pi-star-fill' : 'pi pi-star'" 
                    variant="text" 
                    rounded 
                    :severity="slotProps.data.starred ? 'warn' : 'secondary'" 
                    class="!p-0 !h-8 !w-8"
                    @click="slotProps.data.starred = !slotProps.data.starred"
                />
              </template>
            </Column>

            <Column field="sender" style="width: 20%">
              <template #body="slotProps">
                <span :class="{ 'font-bold text-zinc-900 dark:text-zinc-900': !slotProps.data.read, 'text-zinc-600': slotProps.data.read }">
                  {{ slotProps.data.sender }}
                </span>
              </template>
            </Column>

            <Column field="subject">
              <template #body="slotProps">
                <div class="flex items-center gap-2 max-w-[500px]">
                  <span :class="{ 'font-bold text-zinc-900 dark:text-zinc-900': !slotProps.data.read, 'text-zinc-500': slotProps.data.read }" class="truncate">
                    {{ slotProps.data.subject }}
                  </span>
                  <span class="text-zinc-400 font-normal truncate">- {{ slotProps.data.snippet }}</span>
                  <Tag v-if="slotProps.data.label" :value="slotProps.data.label" severity="secondary" class="!text-[10px] !px-2 !py-0.5" />
                </div>
              </template>
            </Column>

            <Column field="date" headerStyle="text-right" bodyStyle="text-align: right; width: 100px">
              <template #body="slotProps">
                <span :class="{ 'font-bold text-zinc-900': !slotProps.data.read, 'text-zinc-500': slotProps.data.read }" class="text-xs">
                  {{ slotProps.data.date }}
                </span>
              </template>
            </Column>
          </DataTable>
        </div>
      </main>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import Sidebar from '@/Components/Sidebar.vue';
import Navbar from '@/Components/Navbar.vue';

const selectedEmails = ref([]);

const emails = ref([
    { id: 1, sender: 'Google Cloud', subject: 'Actualización de cuotas', snippet: 'Tu cuota de almacenamiento ha cambiado para todos los proyectos...', date: '10:45 AM', read: false, starred: false, label: 'Trabajo' },
    { id: 2, sender: 'Netflix', subject: 'Nueva temporada disponible', snippet: 'No te pierdas el estreno de la semana, El juego del calamar...', date: 'Feb 3', read: true, starred: true },
    { id: 3, sender: 'GitHub', subject: 'Security Alert', snippet: 'We found a vulnerability in one of your repos: gemini-api-test...', date: 'Feb 2', read: false, starred: false, label: 'Importante' },
    { id: 4, sender: 'LinkedIn', subject: '3 personas vieron tu perfil', snippet: 'Descubre quién ha estado mirando tu perfil profesional esta semana', date: 'Jan 30', read: true, starred: false },
    { id: 5, sender: 'Amazon.es', subject: 'Tu pedido ha sido enviado', snippet: 'El paquete llegará mañana antes de las 22:00 horas...', date: 'Jan 28', read: true, starred: false },
]);

const deleteSelected = () => {
    emails.value = emails.value.filter(e => !selectedEmails.value.includes(e));
    selectedEmails.value = [];
};
</script>

<style scoped>
/* Estética minimalista tipo Gmail */
:deep(.p-datatable .p-datatable-tbody > tr) {
    background-color: transparent;
    transition: all 0.1s;
}

:deep(.p-datatable .p-datatable-tbody > tr:hover) {
    background: rgba(0, 0, 0, 0.02);
    box-shadow: inset 1px 0 0 #dadce0, inset -1px 0 0 #dadce0, 0 1px 2px 0 rgba(60,64,67,.3);
}

:deep(.p-datatable-thead) {
    display: none; /* Ocultamos el header de la tabla para usar el Toolbar */
}

:deep(.p-datatable .p-datatable-tbody > tr > td) {
    border-bottom: 1px solid #f1f3f4;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}
</style>