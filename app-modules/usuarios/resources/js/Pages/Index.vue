<template>
  <div class="flex flex-col h-screen bg-slate-50">
    <Navbar />
    <div class="flex flex-1">
      <Sidebar />
      <main class="flex-1 p-8">
        <h2 class="text-2xl font-semibold">Usuarios</h2>
        <p class="mt-2 text-gray-600">
          Gestione los usuarios aquí
        </p>
        <Divider />
        <div class="flex flex-row justify-center">
          <div class="card">
            <DataTable :value="users.data" lazy paginator showGridlines :rows="users.per_page"
              :totalRecords="users.total" :first="(users.current_page - 1) * users.per_page" :sortField="sortField"
              :sortOrder="sortOrder" @page="onPage" @sort="onSort" tableStyle="min-width: 60rem">
              <template #header>
                <div class="flex justify-end">
                  <IconField>
                    <InputIcon>
                      <i class="pi pi-search" />
                    </InputIcon>
                    <InputText v-model="searchQuery" placeholder="Buscar por nombre o correo..."
                      @input="debouncedSearch" />
                  </IconField>
                </div>
              </template>

              <Column field="name" sortable header="Nombre" style="width: 50%"></Column>
              <Column field="email" sortable header="Correo Electrónico" style="width: 50%"></Column>

              <Column header="Acciones" style="width: 20%; min-width: 8rem" :exportable="false"
                headerClass="justify-center" bodyClass="!text-center">
                <template #body="slotProps">
                  <div class="flex justify-center">
                    <Button icon="pi pi-user-edit" v-tooltip.top="'Gestionar Permisos'" variant="outlined" rounded
                      @click="openPermissionModal(slotProps.data)" />
                  </div>
                </template>
              </Column>

              <template #empty> No se encontraron usuarios. </template>
            </DataTable>
            <UserPermissionModal v-model="displayModal" :user="selectedUser" @save="confirmSave" />
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script setup>
import Sidebar from '@/Components/Sidebar.vue';
import Navbar from '@/Components/Navbar.vue';
import UserPermissionModal from '../Components/UserPermissionModal.vue';

import { ref, defineProps } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  users: { type: Object, required: true },
  filters: { type: Object }
});

// Estado local para la búsqueda
const searchQuery = ref(props.filters?.search || '');
const sortField = ref(props.filters?.sortField || 'name');
const sortOrder = ref(props.filters?.sortOrder ? Number(props.filters.sortOrder) : 1);

// Función reutilizable para navegar con todos los parámetros
const updateTable = (params = {}) => {
  router.get(window.location.pathname,
    {
      search: searchQuery.value,
      page: props.users.current_page,
      sortField: sortField.value,
      sortOrder: sortOrder.value,
      ...params
    },
    { preserveState: true, preserveScroll: true, only: ['users'], replace: true }
  );
};

const onSort = (event) => {
  sortField.value = event.sortField;
  sortOrder.value = event.sortOrder; // 1 para ASC, -1 para DESC
  updateTable({ page: 1 }); // Al ordenar, volvemos a la página 1
};

const onPage = (event) => {
  updateTable({ page: event.page + 1 });
};

// Debounce manual para búsqueda
let timeout = null;
const debouncedSearch = () => {
  clearTimeout(timeout);
  timeout = setTimeout(() => updateTable({ page: 1 }), 400);
};

// Logica para el modal de permisos
const displayModal = ref(false);
const selectedUser = ref(null);

const openPermissionModal = (user) => {
  selectedUser.value = user;
  displayModal.value = true;
};

const confirmSave = (user) => {
  console.log("Se intentó guardar cambios para:", user.name);
  // Aquí irá tu lógica futura de Inertia
};
</script>
