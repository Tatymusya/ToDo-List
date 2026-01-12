<template>
    <button
        class="app-button"
        :class="{
            'app-button--default': isDefaultStyle,
            'app-button--text': hasText,
            'app-button--default-only-border': isDefaultOnlyBorderStyle
        }"
        :title="hiddenText"
    >
        <slot></slot>
        <span v-if="hiddenText" class="visually-hidden">{{ hiddenText }}</span>
    </button>
</template>

<script setup>
    const props = defineProps({
        hiddenText: {
            type: String
        },
        isDefaultStyle: {
            type: Boolean,
            default: true
        },
        isDefaultOnlyBorderStyle: {
            type: Boolean,
            default: false
        },
        hasText: {
            type: Boolean,
            default: false
        }
    });
</script>

<style scoped>
    .app-button {
        display: flex;
        justify-content: center;
        align-items: center;
        border: none;
        transition-property: color, background-color, border-color;
        transition-duration: var(--base-transition-duration);
        transition-timing-function: var(--base-transition-timing-function);
        cursor: pointer;

        &.app-button--text {
            text-transform: uppercase;
            font-size: 0.875rem;
            font-weight: 600;
            line-height: 1;
            padding-inline: 1rem;
        }

        &.app-button--default {
            min-inline-size: 2.375rem;
            min-block-size: 2.375rem;
            border-radius: var(--base-border-radius);

            &.app-button--text {
                color: var(--desert-storm-color);
            }

            .app-button svg use {
                fill: var(--desert-storm-color);
            }

            &:enabled {
                background-color: var(--purply-blue-color);
            }

            &:hover {
                background-color: var(--iris-color);

                .app-button svg use {
                    fill: var(--white-color);
                }
            }

            &:active {
                background-color: var(--fuchsia-blue-color);
            }

            &:disabled {
                background-color: var(--gray-goose-color);
            }

            &:focus-visible {
                outline: 0.125rem solid var(--white-color);
                outline-offset: -0.1875rem;
            }
        }
        .app-button svg {
            pointer-events: none;
        }

        &.app-button--default-only-border {
            min-inline-size: 2.375rem;
            min-block-size: 2.375rem;
            border-radius: var(--base-border-radius);
            background-color: transparent;
            border-width: 1px;
            border-style: solid;

            &.app-button--text {
                color: var(--color-border-button-text);
            }

            .app-button svg use {
                fill: var(--desert-storm-color);
            }

            &:enabled {
                border-color: var(--color-border);
            }

            &:hover {
                border-color: var(--iris-color);
                color: var(--iris-color);

                .app-button svg use {
                    fill: var(--white-color);
                }
            }

            &:active {
                border-color: var(--fuchsia-blue-color);
                color: var(--fuchsia-blue-color);
            }

            &:disabled {
                border-color: var(--gray-goose-color);
                color: var(--gray-goose-color);
            }

            &:focus-visible {
                outline: 0.125rem solid var(--white-color);
                outline-offset: -0.1875rem;
            }
        }

    }
</style>
