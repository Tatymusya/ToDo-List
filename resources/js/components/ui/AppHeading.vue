<template>
    <component :is="tag" :class="className" class="app-title">{{ title }}</component>
</template>

<script setup>
    defineProps(['title', 'tag', 'className']);
</script>

