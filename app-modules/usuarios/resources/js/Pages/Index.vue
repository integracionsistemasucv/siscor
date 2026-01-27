<template>
  <div class="flex flex-col h-screen">
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
            <DataTable :value="users" paginator showGridlines :rows="5" :rows_per_page_options="[5, 10, 20, 50]"
              tableStyle="min-width: 60rem">
              <Column field="name" header="Nombre" style="width: 25%"></Column>
              <Column field="email" header="Correo Electrónico" style="width: 25%"></Column>
            </DataTable>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

import Sidebar from '@/Components/Sidebar.vue';
import Navbar from '@/Components/Navbar.vue';

const props = defineProps({
    users: {
        type: Array,
        default: () => []
    }
});
</script>
