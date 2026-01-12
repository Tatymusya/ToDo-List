<template>
    <AppHeader />
    <AppMain>
        <ToDoList :todos="todos"/>
    </AppMain>
</template>

<script setup>
    import AppHeader from '@js/components/layouts/AppHeader.vue';
    import AppMain from '@js/components/layouts/AppMain.vue';
    import ToDoList from '@js/components/ToDoList/ToDoList.vue';

    const props = defineProps(['todos']);

</script>
