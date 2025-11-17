<template>
  <aside
    :class="[
      'bg-gray-100 border-r transition-all duration-300 relative',
      sidebarOpen ? 'w-64' : 'w-16'
    ]"
  >
    <!-- Botón de toggle -->
    <button
      @click="toggleSidebar"
      :class="[
        'bg-gray-800 text-white p-2 rounded flex items-center justify-center gap-2 transition-all duration-300',
        sidebarOpen
          ? 'mx-2 w-[calc(100%-1rem)] top-3 h-10 relative'
          : 'absolute top-3 -right-4 w-full h-10 rounded-r shadow-lg'
      ]"
    >
      <!-- <span v-if="sidebarOpen">Cerrar</span> -->
      <div v-if="sidebarOpen" class="flex flex-row w-full justify-between items-center px-1 ">
          <div class="flex flex-row items-center w-full gap-x-2 hover:bg-gray-200 cursor-pointer">
              <Avatar icon="pi pi-user" class="" shape="circle" /><span>Usuario</span>
          </div>
          <i  class="pi pi-times hover:text-gray-200 cursor-pointer"></i>
      </div>
      <div v-else class="flex flex-row items-center gap-x-1">
          <Avatar icon="pi pi-user" class="" shape="circle" /><i  class="pi pi-chevron-right"></i>
      </div>
    </button>

    <!-- Menú -->
    <ul class=" space-y-2">
      <!-- Estado abierto: labels completos -->
      <li
        v-for="item in menuItems"
        :key="item.label + '-open'"
        v-if="sidebarOpen"
        class="px-4 py-4 mt-8 hover:bg-gray-200 cursor-pointer flex items-center gap-2"
      >
        <i :class="item.icon"></i><span>{{ item.label }}</span>
      </li>

      <!-- Estado cerrado: solo íconos con tooltip en todo el li -->
      <li
        v-for="item in menuItems"
        :key="item.label + '-closed'"
        v-else
        v-tooltip.right="item.label"
        class="px-4 py-4 mt-16 hover:bg-gray-200 cursor-pointer flex items-center justify-center"
      >
        <i :class="item.icon"></i>
      </li>
    </ul>
  </aside>
</template>

<script setup>
import { ref } from "vue";

const sidebarOpen = ref(true);

const toggleSidebar = () => {
  sidebarOpen.value = !sidebarOpen.value;
};

const menuItems = [
  { label: "Inicio", icon: "pi pi-home" },
  { label: "Usuarios", icon: "pi pi-users" },
  { label: "Reportes", icon: "pi pi-clipboard" },
];
</script>
