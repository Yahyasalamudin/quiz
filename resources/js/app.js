require('./bootstrap');
import { createApp } from 'vue';

const app = createApp({});

// Register all Vue components automatically
const files = require.context('./components/', true, /\.vue$/i);
files.keys().map(key => {
    const name = key.split('/').pop().split('.')[0];
    const component = files(key).default;
    app.component(name, component);
});

app.mount('#app');
