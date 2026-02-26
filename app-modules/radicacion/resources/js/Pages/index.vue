<template>
  <div class="flex flex-col h-screen bg-slate-50">
    <Navbar />

    <div class="flex flex-1 overflow-hidden">
      <Sidebar />

      <main class="flex-1 flex flex-col min-w-0 bg-slate-50">

        <div class="px-8 pt-8">
          <h2 class="text-2xl font-semibold text-gray-800">Radicados</h2>
          <p class="mt-2 text-gray-600">Gestione sus radicados aquí</p>
          <div class="mt-4 border-b border-gray-200"></div>
        </div>

        <header class="flex items-end px-8 pt-4 gap-1 bg-slate-50 border-b border-gray-200">
          <button @click="activeTab = 'bandeja'" :class="['px-4 py-2 text-sm font-medium rounded-t-lg transition-colors border-t border-x',
            activeTab === 'bandeja'
              ? 'bg-blue-600 text-white border-blue-600'
              : 'bg-gray-100 text-gray-600 border-transparent hover:bg-gray-200']">
            📥 Bandeja de Entrada
          </button>

          <div v-for="tab in radicaciones" :key="tab.id" class="flex items-center group">
            <button @click="activeTab = tab.id" :class="['px-4 py-2 text-sm font-medium rounded-t-lg transition-colors flex items-center gap-2 border-t border-x',
              activeTab === tab.id
                ? 'bg-emerald-600 text-white border-emerald-600'
                : 'bg-gray-100 text-gray-600 border-transparent hover:bg-gray-200']">
              📄 Nuevo Radicado ({{ tab.id.toString().slice(-4) }})
              <span @click.stop="cerrarTab(tab.id)"
                class="hover:bg-black/20 rounded-full w-4 h-4 flex items-center justify-center transition-colors">
                ×
              </span>
            </button>
          </div>

          <button @click="nuevaRadicacion"
            class="ml-4 px-3 py-1.5 mb-1 text-xs font-bold bg-gray-800 text-white rounded-md hover:bg-black transition-all shadow-sm">
            + NUEVO TRÁMITE
          </button>
        </header>

        <div class="flex-1 overflow-auto p-8">
          <KeepAlive>
            <component :is="activeTab === 'bandeja' ? BandejaPrincipal : RadicadorWizard" :key="activeTab"
              :tabId="activeTab" :radicados="radicados" @close="cerrarTab" />
          </KeepAlive>
        </div>

      </main>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import Sidebar from '@/Components/Sidebar.vue';
import Navbar from '@/Components/Navbar.vue';
import BandejaPrincipal from '../Components/BandejaPrincipal.vue';
import RadicadorWizard from '../Components/RadicadorWizard.vue';

const activeTab = ref('bandeja');
const radicaciones = ref([]);

const nuevaRadicacion = () => {
  const id = Date.now();
  radicaciones.value.push({ id });
  activeTab.value = id;
};

const cerrarTab = (id) => {
  radicaciones.value = radicaciones.value.filter(t => t.id !== id);
  if (activeTab.value === id) {
    activeTab.value = 'bandeja';
  }
};

defineProps({
  radicados: Object
});

</script>

<style scoped>
/* Evita que el scroll del main afecte al Navbar/Sidebar */
main {
  height: 100%;
}
</style>