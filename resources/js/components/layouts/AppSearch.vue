<template>
    <div class="app-search">
        <form method="get" action="api/v1/todos" @submit.prevent="onSubmit">
            <div class="app-search__container">
                <AppInput
                    class="app-search__field"
                    inputType="search"
                    inputName="search"
                    :isDefault="true"
                    placeholder="Введите название записи..."
                    v-model="strSearch"
                />
                <AppButton
                    type="submit"
                    @click="search"
                    class="app-search__button"
                    :isDefaultStyle="false"
                    hiddenText="Искать запись"
                >
                    <IconSearch />
                </AppButton>
            </div>
        </form>
    </div>
</template>

<script setup>
    import AppInput from '@js/components/ui/AppInput.vue';
    import AppButton from '@js/components/ui/AppButton.vue';
    import IconSearch from '@/images/icons/icon-search.svg?component';
    import { router } from "@inertiajs/vue3";
    import { ref } from 'vue';

    const strSearch = ref('');

    const search = () => {
        const url = `search/${strSearch.value}`;

        router.get(url, { query: strSearch.value }, {
            preserveState: true,
            replace: true,
            only: ['todos']
        });
    }

    defineExpose({
        strSearch,
        search
    });

</script>

<style scoped>
    .app-search {
        inline-size: 100%;
        min-block-size: 2.375rem;

        .app-search__container {
            display: flex;
            position: relative;
        }

        .app-search__field {
            padding-inline-end: 3rem;
        }

        .app-search__button {
            position: absolute;
            inset-inline-end: 0.125rem;
            inset-block-start: 0.125rem;
            block-size: calc(2.375rem - 0.25rem);
            inline-size: 2.375rem;
            background-color: transparent;
            border-end-end-radius: var(--base-border-radius);
            border-start-end-radius: var(--base-border-radius);

            svg {
                transition-property: fill;
                transition-duration: var(--base-transition-duration);
                transition-timing-function: var(--base-transition-timing-function);
            }

            &:enabled {
                svg {
                    fill: var(--pastel-grey-color);
                }
            }
            &:hover {
                svg {
                    fill: var(--iris-color);
                }
            }

            &:active {
                svg {
                    fill: var(--blueberry-color);
                }
            }

            &:disabled {
                svg {
                    fill: var(--gray-goose-color);
                }
            }
        }
    }
</style>
