<template>
  <aside :class="[
    'bg-gray-100 border-r transition-all duration-300 relative',
    sidebarOpen ? 'w-64' : 'w-20'
  ]">
    <div class="absolute top-3 -right-4 z-50">
      <button @click="toggleSidebar"
        class="bg-gray-800 text-white w-8 h-10 rounded shadow-lg flex items-center justify-center hover:bg-gray-700 transition-colors">
        <i :class="sidebarOpen ? 'pi pi-times' : 'pi pi-chevron-right'"></i>
      </button>
    </div>

    <div class="w-full px-4 mt-8 mb-4">
      <Link href="/inicio"  v-tooltip.right="!sidebarOpen ? 'Inicio' : null">
        <i class="pi pi-home flex justify-center text-center text-2xl"></i>
      </Link>
      <Divider />
    </div>

    <ul class="list-none p-0 m-0 overflow-hidden">
      <template v-for="item in menuItems" :key="item.label">

        <template v-if="item.label === 'Correspondencias'">
          <li>
            <div @click="toggleSubMenu" :class="[
              'px-4 py-4 hover:bg-gray-200 cursor-pointer flex items-center text-gray-700 transition-all',
              sidebarOpen ? 'justify-between' : 'justify-center'
            ]" v-tooltip.right="!sidebarOpen ? 'Correspondencias' : null">
              <div class="flex items-center gap-3">
                <i :class="item.icon" class="text-xl"></i>
                <span v-if="sidebarOpen" class="font-medium">{{ item.label }}</span>
              </div>
              <i v-if="sidebarOpen"
                :class="['pi pi-chevron-down transition-transform duration-300', subMenuOpen ? 'rotate-180' : '']"
                style="font-size: 0.8rem"></i>
            </div>

            <transition name="slide-fade">
              <ul v-show="subMenuOpen" :class="['bg-gray-50/50', sidebarOpen ? 'pl-8' : 'flex flex-col items-center']">
                <Link v-for="sub in itemsCorrespondencia" :key="sub.label" :href="sub.href"
                  class="flex items-center gap-3 py-3 px-4 hover:text-blue-600 text-gray-600 transition-colors w-full justify-start"
                  :class="{ 'justify-center': !sidebarOpen }" v-tooltip.right="!sidebarOpen ? sub.label : null">
                  <i :class="sub.icon" class="text-lg"></i>
                  <span v-if="sidebarOpen" class="text-sm">{{ sub.label }}</span>
                </Link>
              </ul>
            </transition>
          </li>
        </template>

        <li v-else>
          <Link :href="item.href" v-tooltip.right="!sidebarOpen ? item.label : null" :class="[
            'px-4 py-4 hover:bg-gray-200 cursor-pointer flex items-center text-gray-700 transition-all',
            sidebarOpen ? 'gap-3' : 'justify-center'
          ]">
            <i :class="item.icon" class="text-xl"></i>
            <span v-if="sidebarOpen" class="whitespace-nowrap">{{ item.label }}</span>
          </Link>
        </li>

      </template>
    </ul>
  </aside>
</template>

<script setup>
import { ref } from "vue";
import { Link } from '@inertiajs/vue3';
import Divider from 'primevue/divider';

const sidebarOpen = ref(true);
const subMenuOpen = ref(false);

const toggleSidebar = () => {
  sidebarOpen.value = !sidebarOpen.value;
  // Opcional: Cerrar submenú al colapsar sidebar
  // if (!sidebarOpen.value) subMenuOpen.value = false;
};

const toggleSubMenu = () => {
  subMenuOpen.value = !subMenuOpen.value;
};

const itemsCorrespondencia = [
  { label: 'Bandeja de entrada', icon: 'pi pi-download', href: '/bandeja-entrada' },
  { label: 'Enviadas', icon: 'pi pi-upload', href: '/enviadas' },
  { label: 'Pendientes', icon: 'pi pi-clock', href: '/pendientes' },
];

const menuItems = [
  { label: "Correspondencias", icon: "pi pi-envelope", href: "#" },
  { label: "Archivo", icon: "pi pi-box", href: "/Archivo" },
  { label: "Usuarios", icon: "pi pi-users", href: "/usuarios" },
  { label: "Reportes", icon: "pi pi-clipboard", href: "/reportes" },
];
</script>

<style scoped>
/* Animación tipo PrimeVue (Slide + Fade) */
/* .slide-fade-enter-active {
  transition: all 0.3s ease-out;
} */
/* .slide-fade-leave-active {
  transition: all 0.2s cubic-bezier(1, 0.5, 0.8, 1);
} */
.slide-fade-enter-from,
.slide-fade-leave-to {
  transform: translateY(-10px);
  opacity: 0;
  max-height: 0;
}

/* Ajuste para que el submenú no rompa el diseño */
ul {
  transition: max-height 0.3s ease-in-out;
}
</style>