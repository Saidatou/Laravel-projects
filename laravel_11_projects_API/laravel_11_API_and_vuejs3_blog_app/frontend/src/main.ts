// import './assets/main.css'
import './style.css'
import 'vue-toast-notification/dist/theme-bootstrap.css';
import '@formkit/themes/genesis'
import { plugin, defaultConfig } from '@formkit/vue'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import { createPinia } from 'pinia'
import config from '../formkit.config.ts'
import { createApp } from 'vue'
import ToastPlugin from 'vue-toast-notification';
import App from './App.vue'
import router from './router'


const app = createApp(App)
const pinia = createPinia()
pinia.use(piniaPluginPersistedstate);
app.use(ToastPlugin);

app.use(router);
app.use(pinia);
app.use(plugin, defaultConfig(config));


app.mount('#app')
