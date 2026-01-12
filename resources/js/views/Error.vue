<template>
    <AppHeader />
    <AppMain>
        <AppEmpty :message="'Ничего не найдено'">
            <Link href="/" class="app-not-found__link">На главную</Link>
        </AppEmpty>
    </AppMain>
</template>

<script setup>
    import AppHeader from '@js/components/layouts/AppHeader.vue';
    import AppMain from '@js/components/layouts/AppMain.vue';
    import AppEmpty from '@js/components/layouts/AppEmptyContainer.vue';
    import { Link } from '@inertiajs/vue3';
</script>

<style scoped>
    .app-not-found__link {
        margin-block: 1rem;
        display: block;
        text-align: center;
    }
</style>
