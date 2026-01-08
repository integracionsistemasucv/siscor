<template>
  <nav class="h-14 bg-gray-800 text-white flex items-center px-4">
    <h1 class="text-lg font-bold">SISCOR</h1>
    <div>
      <Avatar icon="pi pi-user" class="mr-2" style="background-color: #ece9fc; color: #2a1261" shape="circle" />
      <div>
        <div v-if="user">
          <h1>Bienvenido, {{ user.name }}</h1>
        </div>
        <div v-else>
          <h1>Bienvenido invitado</h1>
        </div>
      </div>

    </div>
  </nav>
</template>

<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
const page = usePage();
const user = page.props.auth?.user;

</script>
