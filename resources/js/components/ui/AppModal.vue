<template>
    <teleport to="body">
        <dialog class="app-modal" :id="id">
            <header class="app-modal__header">
                <h3>{{ modalTitle }}</h3>
                <AppButton class="app-modal__close-button" hiddenText="Закрыть" :isDefaultStyle="false" @click="close">
                    <IconCross />
                </AppButton>
            </header>
            <slot name="content"></slot>
            <footer class="app-modal__controls">
                <slot name="controls"></slot>
            </footer>
        </dialog>
    </teleport>
</template>

<script setup>
    import AppButton from '@js/components/ui/AppButton.vue';
    import IconCross from '@/images/icons/icon-cross.svg?component';

    const props = defineProps(['modalTitle', 'id']);

    const close = () => {
        const formTextRecord = document.getElementById(props.id);
        formTextRecord.close();
    }

    defineExpose({
        close,
    });
</script>

<style scoped>
    .app-modal {
        inline-size: 32dvw;
        min-block-size: 18rem;
        overflow: hidden;
        border-radius: var(--base-border-radius);
        background-color: var(--color-background-block);
        border-width: 1px;
        border-style: solid;
        border-color: var(--color-border);
        color: var(--color-base-font-text);

        &:open {
            display: grid;
            grid-template-rows: 2.5rem auto 2.5rem;
        }


        &::backdrop {
            background-color: hsl(from var(--dark-jungle-green-color) h s l / 16%);
            backdrop-filter: blur(10px);
        }

        .app-modal__close-button {
            position: absolute;
            inset-block-start: 0;
            inset-inline-end: 0;
            block-size: 1.75rem;
            inline-size: 1.75rem;
            border-radius: var(--base-border-radius);

            & svg {
                block-size: 1.75rem;
            }
        }

        .app-modal__header {
            display: flex;
            block-size: 2.5rem;
            align-items: center;
            justify-content: center;
            position: relative;
            text-align: center;
        }

        .app-modal__controls {
            display: flex;
            block-size: 2.5rem;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

    }
</style>
