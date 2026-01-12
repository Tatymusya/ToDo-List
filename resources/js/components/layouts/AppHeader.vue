<template>
    <header class="app-header">
        <div class="app-header__container">
            <AppHeading title="Список дел" tag="h1" className="app-header__title"/>
            <AppNav />
        </div>
    </header>
</template>

<script setup>
    import AppHeading from '@js/components/ui/AppHeading.vue';
    import AppNav from '@js/components/layouts/AppNav.vue';
</script>

<style scoped>
    .app-header {
        display: flex;
        /*block-size: clamp(6rem, 19.01dvh, 24rem);*/
        align-items: end;
        justify-content: center;

        @container (inline-size > 20rem) {
            block-size: 6.4375rem;
        }

        @container (inline-size > 80rem) {
            block-size: 8.4375rem;
        }

        .app-header__container {
            margin-inline: auto;

            @container (inline-size > 20rem) {
                inline-size: 86dvw;
            }

            @container (inline-size > 48rem) {
                inline-size: 60dvw;
            }

            @container (inline-size > 80rem) {
                inline-size: 40dvw;
            }
        }

        .app-header__title {
            text-align: center;
            font-weight: 600;
            @container (inline-size > 20rem) {
                margin-block-end: 1rem;
            }

            @container (inline-size > 80rem) {
                margin-block-end: 1.3rem;
            }
        }
    }

</style>
