<template>
  <div class="flex h-full w-full bg-white">
    
    <section class="w-1/2 border-r border-gray-300 bg-gray-500 flex flex-col">
      <div class="p-2 bg-gray-800 text-white text-xs flex justify-between items-center">
        <span>VISOR DE SOPORTE DIGITAL</span>
        <input type="file" @change="handleFileUpload" class="text-xs" accept="application/pdf">
      </div>
      <div class="flex-1 flex items-center justify-center text-gray-300">
        <div v-if="!pdfUrl" class="text-center">
          <p>Cargue un archivo para visualizarlo</p>
        </div>
        <iframe v-else :src="pdfUrl" class="w-full h-full border-none"></iframe>
      </div>
    </section>

    <section class="w-1/2 flex flex-col">
      <div class="p-4 border-b flex justify-between bg-gray-50">
        <div v-for="step in [1,2,3]" :key="step" 
             :class="['w-8 h-8 rounded-full flex items-center justify-center font-bold', 
                      currentStep >= step ? 'bg-emerald-500 text-white' : 'bg-gray-300']">
          {{ step }}
        </div>
      </div>

      <div class="p-6 flex-1 overflow-y-auto">
        
        <div v-if="currentStep === 1">
          <h2 class="text-xl font-bold mb-4">Información del Remitente</h2>
          <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium">Buscador de Terceros (Nombre/NIT)</label>
              <input type="text" class="w-full border p-2 rounded mt-1" placeholder="Ej: Juan Perez...">
            </div>
            </div>
        </div>

        <div v-if="currentStep === 2">
          <h2 class="text-xl font-bold mb-4">Clasificación Documental (TRD)</h2>
          <div class="space-y-4">
            <select class="w-full border p-2 rounded">
              <option>Seleccione Dependencia...</option>
            </select>
            <select class="w-full border p-2 rounded">
              <option>Seleccione Serie...</option>
            </select>
            </div>
        </div>

      </div>

      <div class="p-4 border-t flex justify-between bg-gray-50">
        <button @click="currentStep--" :disabled="currentStep === 1" class="px-4 py-2 border rounded">Anterior</button>
        <button v-if="currentStep < 3" @click="currentStep++" class="px-4 py-2 bg-blue-600 text-white rounded">Siguiente</button>
        <button v-else class="px-4 py-2 bg-emerald-600 text-white rounded">Finalizar Radicación</button>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const currentStep = ref(1);
const pdfUrl = ref(null);

const handleFileUpload = (e) => {
  const file = e.target.files[0];
  if (file) pdfUrl.value = URL.createObjectURL(file);
};
</script>