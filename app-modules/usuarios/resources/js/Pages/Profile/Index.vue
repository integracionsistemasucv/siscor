<template>
  <div class="flex flex-col h-screen">
    <Navbar />
    <div class="flex flex-1">
      <Sidebar />
      <main class="flex-1 p-8">
        <h2 class="text-2xl font-semibold">Perfil</h2>
        <p class="mt-2 text-gray-600">
            Gestione su perfil aquí
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

