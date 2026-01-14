<template>
    <tr v-if="hasDropDownMenu" :id="trId" @click="$emit('dropdown')">
        <slot></slot>
    </tr>
    <tr v-if="!hasDropDownMenu" :id="trId">
        <slot></slot>
    </tr>
</template>

<script setup>
    const props = defineProps(['hasDropDownMenu', 'cellsPerRow', 'trId', 'dataParentId']);
    const emit = defineEmits(['dropdown']);
</script>

