<template>
    <div class="app-empty-container">
        <strong class="app-empty__title">&#10594; {{ message }} &#10596;</strong>
        <slot></slot>
    </div>
</template>

<script setup>
    const props = defineProps(['message']);
</script>

<style scoped>
    .app-empty-container {
        inline-size: 100%;
        min-block-size: 14rem;
        background-image: image-set(
            "../../../images/backgrounds/Detective-check-footprint-1x.png" 1x,
            "../../../images/backgrounds/Detective-check-footprint-2x.png" 2x,
            "../../../images/backgrounds/Detective-check-footprint-3x.png" 3x
        );
        background-repeat: no-repeat;
        background-position: 50% 3rem;

        .app-empty__title {
            display: block;
            padding-block-start: 15rem;
            text-align: center;
            font-size: 1.2rem;
            font-weight: 500;
        }
    }
</style>
