<template>
    <ul class="app-pagination" role="list">
        <li
            v-for="item in meta.links"
            :key="item.label"
            class="app-pagination__item"
        >
            <Link
                v-if="item.url && meta.current_page != item.label"
                :href="item.url || ''"
                class="app-pagination__link"
            >
                {{ item.label }}
            </Link>
            <span v-if="!item.url" class="app-pagination__disable">
                {{ item.label }}
            </span>
            <strong
                class="app-pagination__current"
                v-if="meta.current_page == item.label"
            >
                {{ item.label }}
            </strong>
        </li>
    </ul>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';
    const props = defineProps(['meta']);
</script>

<style scoped>
    .app-pagination {
        display: flex;
        gap: 1rem;
        justify-content: center;
        align-items: center;
        margin-block-start: 1rem;

        .app-pagination__link {
            display: flex;
            block-size: 1.75rem;
            min-inline-size: 1.75rem;
            justify-content: center;
            align-items: center;
            color: var(--color-base-font-link);
        }

        .app-pagination__disable {
            color: var(--color-paginator-disable);
            cursor: default;
        }

        .app-pagination__current {
            display: flex;
            block-size: 1.75rem;
            inline-size: 1.75rem;
            justify-content: center;
            align-items: center;
        }
    }
</style>
