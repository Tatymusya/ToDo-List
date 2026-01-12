<template>
    <nav class="app-nav">
        <AppSearch />
        <ColorThemeSwitcher hiddenText="Сменить цветовую схему" />
    </nav>
</template>

<script setup>
    import AppSearch from '@js/components/layouts/AppSearch.vue';
    import ColorThemeSwitcher from '@js/components/ColorThemeSwitcher.vue';
</script>

<style scoped>
    .app-nav {
        inline-size: 100%;
        display: grid;
        grid-template-columns: auto 2.375rem;
        column-gap: 1rem;
        align-items: center;
    }
</style>
