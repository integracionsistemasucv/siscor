<template>
  <div class="flex flex-col h-screen bg-slate-50">
    <Navbar />

    <div class="flex flex-1 overflow-hidden">
      <Sidebar />

      <main class="flex-1 p-8 overflow-y-auto">
        <div class="max-w-6xl mx-auto">
          
          <header class="mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Perfil de Usuario</h2>
            <p class="text-gray-600">Gestione su identidad institucional y preferencias del sistema.</p>
          </header>
          
          <Divider class="mb-6" />

          <Card class="mb-6 shadow-sm border-round-xl">
            <template #content>
              <div class="flex flex-column md:flex-row align-items-center gap-5">
                <Avatar 
                  image="https://www.primefaces.org/wp-content/uploads/2020/05/placeholder.png" 
                  size="xlarge" 
                  shape="circle" 
                  style="width: 90px; height: 90px" 
                />
                <div class="flex-grow-1 text-center md:text-left">
                  <div class="text-2xl font-bold text-900">{{ userData.fullName }}</div>
                  <div class="text-600 mb-3">{{ userData.position }} — <span class="font-medium text-primary">{{ userData.department }}</span></div>
                  <div class="flex flex-wrap justify-content-center md:justify-content-start gap-2">
                    <Tag severity="success" value="Sincronizado con LDAP" icon="pi pi-sync" />
                    <Tag severity="secondary" :value="userData.employeeId" />
                  </div>
                </div>
              </div>
            </template>
          </Card>

          <div class="card shadow-sm border-round-xl overflow-hidden bg-white">
            <Tabs value="0">
              <TabList>
                <Tab value="0">
                  <i class="pi pi-id-card mr-2"></i> Información Institucional
                </Tab>
                <Tab value="1">
                  <i class="pi pi-pencil mr-2"></i> Firma y Rúbrica
                </Tab>
                <Tab value="2">
                  <i class="pi pi-cog mr-2"></i> Preferencias
                </Tab>
              </TabList>

              <TabPanels>
                <TabPanel value="0">
                  <div class="grid p-fluid mt-2">
                    <div class="col-12 md:col-6 field mb-4">
                      <label class="font-semibold block mb-2 text-700">Usuario de Red</label>
                      <InputText v-model="userData.username" disabled class="bg-gray-100" />
                    </div>
                    <div class="col-12 md:col-6 field mb-4">
                      <label class="font-semibold block mb-2 text-700">Correo Institucional</label>
                      <InputText v-model="userData.email" disabled class="bg-gray-100" />
                    </div>
                    <div class="col-12 md:col-6 field mb-4">
                      <label class="font-semibold block mb-2 text-700">Ubicación Física</label>
                      <InputText v-model="userData.location" disabled class="bg-gray-100" />
                    </div>
                    <div class="col-12 md:col-6 field mb-4">
                      <label class="font-semibold block mb-2 text-700">Extensión</label>
                      <InputText v-model="userData.phone" disabled class="bg-gray-100" />
                    </div>
                  </div>
                </TabPanel>

                <TabPanel value="1">
                  <div class="flex flex-column md:flex-row gap-6 p-4">
                    <div class="flex-1 flex flex-column align-items-center justify-content-center border-1 border-300 border-dashed border-round-lg p-4 bg-gray-50">
                      <span class="text-sm font-bold text-500 mb-4 uppercase tracking-wider">Firma Registrada</span>
                      <Image src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Jon_Kirsch%27s_Signature.png" width="250" preview />
                    </div>
                    <div class="flex-1">
                      <h4 class="text-xl font-semibold mb-2 text-gray-800">Cargar Nueva Firma</h4>
                      <p class="text-600 mb-4">La imagen se estampará en los PDF de correspondencia generados.</p>
                      
                      <FileUpload mode="basic" name="signature" accept="image/png" :maxFileSize="1000000"
                         auto chooseLabel="Seleccionar PNG Transparente" class="w-full" />
                      
                      <Message severity="warn" icon="pi pi-exclamation-triangle" class="mt-4" :closable="false">
                        Asegúrese de que la firma tenga suficiente contraste.
                      </Message>
                    </div>
                  </div>
                </TabPanel>

                <TabPanel value="2">
                  <div class="grid p-fluid">
                    <div class="col-12 md:col-6">
                      <div class="p-3 border-bottom-1 border-100 flex justify-content-between align-items-center">
                        <div>
                          <div class="font-bold">Notificaciones Email</div>
                          <div class="text-sm text-500">Recibir avisos de nueva correspondencia</div>
                        </div>
                        <ToggleSwitch v-model="prefs.emailNotif" />
                      </div>
                    </div>
                    
                    <div class="col-12 md:col-6 pt-4 md:pt-0">
                      <div class="field px-3 mb-4">
                        <label class="font-bold block mb-2">Idioma</label>
                        <Select v-model="prefs.lang" :options="languages" optionLabel="name" placeholder="Seleccionar idioma" />
                      </div>
                      <div class="field px-3 mb-4">
                        <label class="font-bold block mb-2">Página de Inicio</label>
                        <Select v-model="prefs.defaultView" :options="viewOptions" placeholder="Elegir vista por defecto" />
                      </div>
                    </div>
                  </div>
                  <div class="flex justify-content-end mt-4 p-3">
                    <Button label="Guardar Configuración" icon="pi pi-save" @click="savePrefs" />
                  </div>
                </TabPanel>
              </TabPanels>
            </Tabs>
          </div>

        </div>
      </main>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
// import { useToast } from "primevue/usetoast";
import Sidebar from '@/Components/Sidebar.vue';
import Navbar from '@/Components/Navbar.vue';

// const toast = useToast();

const page = usePage();
const user = computed(() => page.props.auth?.user);

const userData = ref({
  fullName: user.value.name,
  username: user.value.name,
  email: user.value.email,
  position: 'Tecnico en tecnología',
  department: 'DTIC',
  employeeId: 'ID-88294',
  phone: 'Ext. 4502',
  location: 'Sede Principal - Piso 3'
});

const prefs = ref({
  emailNotif: true,
  lang: { name: 'Español', code: 'ES' },
  defaultView: 'Bandeja de Entrada'
});

const languages = [
  { name: 'Español', code: 'ES' },
  { name: 'Inglés', code: 'EN' }
];

const viewOptions = ['Bandeja de Entrada', 'Pendientes', 'Enviados'];

const savePrefs = () => {
    // Aquí iría tu lógica de guardado
    console.log("Preferencias guardadas");
};
</script>

<style scoped>
/* Asegura que el componente Select de PrimeVue no se vea como un select de HTML */
:deep(.p-select) {
    width: 100%;
}
</style>
