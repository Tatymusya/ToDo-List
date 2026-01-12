<template>
    <ul class="app-breadcrumbs" role="list">
        <li>
            <Link
                href="/"
                class="app-breadcrumbs__item"
            >
                На главную
            </Link>
            <strong class="app-breadcrumbs__separator">&#183;</strong>
            <span class="app-breadcrumbs__item">Результаты поиска</span>
        </li>
        <li>
            Количество записей: <strong>{{ count }}</strong>
        </li>
    </ul>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';
    const props = defineProps(['count']);
</script>

<style scoped>
    .app-breadcrumbs {
        display: grid;
        grid-template-columns: 1fr auto;
        font-size: 0.8rem;
        align-items: center;
        padding-block: 1rem;

        .app-breadcrumbs__separator {
            font-size: 1.2rem;
            margin-inline: 0.3rem;
            color: hsl(from var(--gray-goose-color) h s l / 0.6);
        }
    }
</style>
