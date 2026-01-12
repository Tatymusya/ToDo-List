import { createMemoryHistory, createRouter } from 'vue-router';

import HomeView from '@js/views/HomeView.vue';

const routes = [
  { path: '/', component: HomeView },
];

export const router = createRouter({
  history: createMemoryHistory(),
  routes,
});
