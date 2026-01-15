<template>
  <nav class="h-16 bg-gray-800 text-white flex items-center px-8 justify-between">
    <h1 class="text-lg font-bold">SISCOR</h1>

    <div class="ms-3 relative">
      <Dropdown align="right" width="48">
        <template #trigger>
          <!-- foto de perfil -->
          <!-- <button v-if="$page.props.jetstream.managesProfilePhotos"
            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
            <img class="size-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url"
              :alt="$page.props.auth.user.name">
          </button> -->
          
          <span v-if="user" class="inline-flex rounded-md">
            <button type="button"
              class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white hover:text-gray-700 focus:outline-none  transition ease-in-out duration-150">
              <Avatar icon="pi pi-user" class="mr-2" style="background-color: #ece9fc; color: #2a1261" shape="circle" />
              {{ user.name }}

              <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
              </svg>
            </button>
          </span>
        </template>

        <template #content>
          <!-- Account Management -->
          <div class="block px-4 py-2 text-xs text-gray-400">
            Gestión de cuenta
          </div>

          <DropdownLink :href="route('usuarios.index')">
            Perfil
          </DropdownLink>
          <div class="border-t border-gray-200" />

          <!-- Authentication -->
          <form @submit.prevent="logout">
            <DropdownLink as="button">
              Cerrar sesión
            </DropdownLink>
          </form>
        </template>
      </Dropdown>
    </div>
  </nav>
</template>

<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

const page = usePage();
const user = computed(() => page.props.auth?.user); 

const logout = () => {
    router.post(route('logout'));
};
</script>
