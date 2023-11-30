require('./bootstrap');

import { createApp } from 'vue';
import showList from './components/showList.vue';

createApp({
    components: {
        showList,
    }
}).mount('#app');