<template>
    <AppHeader />
    <AppMain>
        <AppBreadcrumbs :count="countTodos" />
        <AppEmpty v-if="countTodos === 0" :message="'Записи не найдены'" />
        <ToDoList :todos="todos" :isSearchResult="isSearchResult" />
    </AppMain>
</template>

<script setup>
    import AppHeader from '@js/components/layouts/AppHeader.vue';
    import AppMain from '@js/components/layouts/AppMain.vue';
    import ToDoList from '@js/components/ToDoList/ToDoList.vue';
    import AppBreadcrumbs from '@js/components/layouts/AppBreadcrumbs.vue';
    import AppEmpty from '@js/components/layouts/AppEmptyContainer.vue';

    const props = defineProps(['todos', 'countTodos']);
    const isSearchResult = true;

</script>
