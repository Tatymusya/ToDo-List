<template>
    <td
        class="app-table__cell"
        :class="{
            'app-table__cell--def-select': defaultSelect,
            'app-table__cell--red-select': redSelect,
            'app-table__cell--green-select': greenSelect
        }"
    >
        {{ tbodyDataItem }}
        <slot></slot>
    </td>
</template>

<script setup>
    const props = defineProps(['tbodyDataItem', 'defaultSelect', 'redSelect', 'greenSelect']);
</script>

<style scoped>
    .app-table__cell {
        background-color: var(--color-background-table);
        border: 1px solid var(--color-border-table);
        border-bottom: none;
        font-size: 0.8rem;
        padding-block: 0.4rem;
        text-align: center;
    }

    .app-table__cell--def-select {
        background-color: var(--color-background-table-cell-sel-def);
    }

    .app-table__cell--red-select {
        background-color: var(--color-background-table-cell-sel-red);
    }

    .app-table__cell--green-select {
        background-color: var(--color-background-table-cell-sel-green);
    }
</style>
