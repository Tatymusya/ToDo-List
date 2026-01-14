<template>
    <AppHeader />
    <AppMain>
        <AppTableDropdown :salaries="salaries.data" />
    </AppMain>
</template>

<script setup>
    import AppHeader from '@js/components/layouts/AppHeader.vue';
    import AppMain from '@js/components/layouts/AppMain.vue';
    import AppTableDropdown from '@js/components/ui/AppTable/AppTableDropdown.vue';

    const props = defineProps(['salaries']);

</script>

