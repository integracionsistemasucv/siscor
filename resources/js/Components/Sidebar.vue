<template>
  <aside :class="[
    'bg-gray-100 border-r transition-all duration-300 relative',
    sidebarOpen ? 'w-64' : 'w-16'
  ]">
    <!-- Botón de toggle -->
    <div class="absolute top-3 flex justify-end w-full ">
      <button @click="toggleSidebar" :class="[
        'bg-gray-800 text-white p-2 rounded flex items-center justify-center gap-2 transition-all duration-300',
        sidebarOpen
          ? 'top-3 -right-4 h-10 relative'
          : 'absolute top-3 -right-4 w-full h-10 rounded-r shadow-lg'
      ]">
        <div v-if="sidebarOpen" class="flex flex-row w-full justify-end px-4 ">
          <i class="pi pi-times hover:text-gray-200 cursor-pointer"></i>
        </div>
        <div v-else class="flex flex-row items-center gap-x-1">
          <i class="pi pi-chevron-right hover:text-gray-200 cursor-pointer"></i>
        </div>
      </button>
    </div>

    <div class=" w-full px-4 mt-8" v-if="sidebarOpen">
      <h2>Logo</h2>
      <Divider/>
    </div>

    <!-- Menú -->
    <ul class="space-y-0">
      <!-- Estado abierto -->
      <Link v-for="item in menuItems" :key="item.label + '-open'" v-if="sidebarOpen" :href="item.href" as="li"
        class="px-4 py-4 hover:bg-gray-200 cursor-pointer flex items-center gap-2">
      <i :class="item.icon"></i>
      <span>{{ item.label }}</span>
      </Link>

      <!-- Estado cerrado (solo íconos con tooltip) -->
      <Link v-for="item in menuItems" :key="item.label + '-closed'" v-else :href="item.href" as="li"
        v-tooltip.right="item.label"
        class="px-4 py-4 mt-20 hover:bg-gray-200 cursor-pointer flex items-center justify-center">
      <i :class="item.icon"></i>
      </Link>
    </ul>
  </aside>
</template>

<script setup>
import { ref } from "vue";
import { Link } from '@inertiajs/vue3'

const sidebarOpen = ref(true);

const toggleSidebar = () => {
  sidebarOpen.value = !sidebarOpen.value;
};

const menuItems = [
  { label: "Correspondencias", icon: "pi pi-envelope", href: "/correspondencias" },
  { label: "Archivo", icon: "pi pi-box", href: "/Archivo" },
  { label: "Usuarios", icon: "pi pi-users", href: "/usuarios" },
  { label: "Reportes", icon: "pi pi-clipboard", href: "/reportes" },
];
</script>
