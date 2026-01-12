<template>
    <li class="todo-list__item" :class="{ 'todo-list__item--completed': isCompleted }">
        <span class="todo-list__content">
            <AppInput
                inputType="checkbox"
                :isCheckbox="true"
                :inputName="`completed-${id}`"
                @change="$emit('updateCompleteTodo')"
                :checked="isCompleted"
                :class="{
                    'app-input--checked': isCompleted
                }"
            />
            <slot></slot>
        </span>
        <span class="todo-list__controls">
            <AppButton
                v-if="!isCompleted"
                :isDefaultStyle="false"
                hiddenText="Редактировать запись"
                class="todo-list__controls__button todo-list__controls__button--edit"
                @click="$emit('editNote')"
            >
                <IconEdit />
            </AppButton>
            <AppButton
                :isDefaultStyle="false"
                hiddenText="Удалить запись"
                class="todo-list__controls__button todo-list__controls__button--delete"
                @click="$emit('deleteTodo')"
            >
                <IconDelete />
            </AppButton>
        </span>
    </li>
</template>

<script setup>
    import AppButton from '@js/components/ui/AppButton.vue';
    import AppInput from '@js/components/ui/AppInput.vue';
    import IconEdit from '@/images/icons/icon-edit.svg?component';
    import IconDelete from '@/images/icons/icon-delete.svg?component';

    const emit = defineEmits(['deleteTodo', 'updateCompleteTodo', 'editNote']);

    const props = defineProps(['id', 'isCompleted', 'isEditTodo']);

</script>

<style scoped>
    .todo-list__item {
        inline-size: 100%;
        min-block-size: 2.8rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-block: 0.5rem;

        &:not(&:last-child) {
            border-bottom: 1px solid var(--purply-blue-color);
        }

        &.todo-list__item--completed {
            text-decoration: line-through;

            .todo-list__content {
                opacity: 0.5;
            }
        }

    }

    .todo-list__content {
        display: grid;
        grid-template-columns: 2rem 2.8rem auto;
        align-items: center;
    }

    .todo-list__controls {
        display: flex;

        .todo-list__controls__button {
            background-color: transparent;

            svg {
                transition-property: stroke;
                transition-duration: var(--base-transition-duration);
                transition-timing-function: var(--base-transition-timing-function);
                pointer-events: none;
            }

            &.todo-list__controls__button--edit {
                &:enabled {
                    svg {
                        stroke: var(--pastel-grey-color);
                    }
                }
                &:hover {
                    svg {
                        stroke: var(--iris-color);
                    }
                }

                &:active {
                    svg {
                        stroke: var(--blueberry-color);
                    }
                }

                &:disabled {
                    svg {
                        stroke: var(--gray-goose-color);
                    }
                }
            }

            &.todo-list__controls__button--delete {
                &:enabled {
                    svg {
                        stroke: var(--pastel-grey-color);
                    }
                }
                &:hover {
                    svg {
                        stroke: var(--rosso-corsa-color);
                    }
                }

                &:active {
                    svg {
                        stroke: var(--guardsman-red-color);
                    }
                }

                &:disabled {
                    svg {
                        stroke: var(--gray-goose-color);
                    }
                }
            }
        }
    }
</style>
