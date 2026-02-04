
// componnentes no soportados por la importación automática (resolver)
import Drawer from 'primevue/drawer';
import DatePicker from 'primevue/datepicker';
import MeterGroup from 'primevue/metergroup';
import Splitter from 'primevue/splitter';
import VirtualScroller from 'primevue/virtualscroller';
import ConfirmDialog from 'primevue/confirmdialog';

// agregados el 04-02-2026 por no ser soportados por la importación automática
import Tabs from 'primevue/tabs';
import TabList from 'primevue/tablist';
import Tab from 'primevue/tab';
import TabPanels from 'primevue/tabpanels';
import TabPanel from 'primevue/tabpanel';
import Select from 'primevue/select'; 
import ToggleSwitch from 'primevue/toggleswitch'; 

// Directivas
import Tooltip from 'primevue/tooltip';

// 🔥 Función para registrar manualmente los componentes
export default function registerManualPrimeVue(app) {
    // Componentes
    app.component('Drawer', Drawer);
    app.component('DatePicker', DatePicker);
    app.component('MeterGroup', MeterGroup);
    app.component('Splitter', Splitter);
    app.component('VirtualScroller', VirtualScroller);
    app.component('ConfirmDialog', ConfirmDialog);

    // familia Tabs
    app.component('Tabs', Tabs);
    app.component('TabList', TabList);
    app.component('Tab', Tab);
    app.component('TabPanels', TabPanels);
    app.component('TabPanel', TabPanel);

    // nuevos componentes Select y ToggleSwitch
    app.component('Select', Select);
    app.component('ToggleSwitch', ToggleSwitch);

    // Directivas
    app.directive('tooltip', Tooltip);
}
