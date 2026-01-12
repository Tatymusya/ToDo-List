<template>
    <AppHeader />
    <AppMain>
        <RouterView />
    </AppMain>
    <FormTextRecord />
</template>

<script>
    import AppHeader from '@js/components/layouts/AppHeader.vue';
    import AppMain from '@js/components/layouts/AppMain.vue';
    import FormTextRecord from '@js/components/FormTextRecord.vue';
    export default {
        name: 'App',
        components: {
            AppHeader,
            AppMain,
            FormTextRecord
        }
    };
</script>
