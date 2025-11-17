
// componnentes no soportados por la importación automática (resolver)
import Drawer from 'primevue/drawer';
import DatePicker from 'primevue/datepicker';
import MeterGroup from 'primevue/metergroup';
import Splitter from 'primevue/splitter';
import VirtualScroller from 'primevue/virtualscroller';
import ConfirmDialog from 'primevue/confirmdialog';

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

    // Directivas
    app.directive('tooltip', Tooltip);
}
