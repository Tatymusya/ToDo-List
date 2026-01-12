<template>
    <input
        :type="inputType"
        class="app-input"
        :class="{
            'app-input--default': isDefault,
            'app-input--checkbox': isCheckbox
        }"
        :name="inputName"
        v-model="inputValue"
    >
</template>

<script setup>
    const inputValue = defineModel();
    const props = defineProps({
        inputType: {
                default: 'text'
            },
            inputName: {
                type: String
            },
            isDefault: {
                type: Boolean,
            },
            isCheckbox: {
                type: Boolean
            }
    });

</script>

<style scoped>
    .app-input {
        border-radius: var(--base-border-radius);
        background-color: var(--color-background-input);
        border-width: 1px;
        border-style: solid;
        border-color: var(--color-border-input);
        padding-inline: 1rem;
        color: var(--color-base-font-text);
        transition-property: color, background-color, border-color;
        transition-duration: var(--base-transition-duration);
        transition-timing-function: var(--base-transition-timing-function);

        &.app-input--default {
            inline-size: 100%;
            min-block-size: 2.375rem;
            padding-inline: 1rem;
        }

        &.app-input--checkbox {
            position: relative;
        }

        &:active,
        &:focus {
            outline: 1px solid var(--color-border-active);
            border-color: var(--color-border-active);
            background-color: var(--white-color);
            color: var(--color-base-font-text-focus);
        }

        &:-webkit-autofill,
        &:-webkit-autofill:hover,
        &:-webkit-autofill:focus,
        &:autofill,
        &:autofill:focus,
        &:autofill:hover {
            transition-property: background-color, border-color;
            transition-duration: var(--base-transition-duration);
            transition-timing-function: var(--base-transition-timing-function);
            background-color: var(--white-color);
            box-shadow: 80px 80px 1px inset var(--color-boxshadow-input);
        }

        &::-webkit-search-cancel-button {
            -webkit-appearance: none;
            cursor: pointer;
            height: 1.25rem;
            width: 1.25rem;
            background-image: var(--color-background-image-cancel-button);
            background-size: cover;
        }
    }

    .app-input--checkbox {
        inline-size: 1rem;
        min-block-size: 1rem;
        border-radius: var(--base-border-radius);
        border: none;
        position: relative;

        &:before {
            content: '';
            display: block;
            cursor: pointer;
            border: 1px solid var(--color-border);
            inline-size: calc(1rem + 4px);
            min-block-size: calc(1rem + 4px);
            border-radius: var(--base-border-radius);
            background-color: var(--color-background-input);
            position: absolute;
            inset-inline-start: -2px;
            inset-block-start: -2px;
            transition-property: background-color, border-color, background-image;
            transition-duration: var(--base-transition-duration);
            transition-timing-function: var(--base-transition-timing-function);
        }

        &:hover::before,
        &:focus::before {
            border-color: var(--color-border-active);
            background-color: var(--color-background-input-checked);
        }

        &:checked::before {
            background-color: var(--color-background-input-checked);
            background-image: var(--color-background-image-input-checked);
            background-repeat: no-repeat;
            background-position: 50% 0;
        }
    }

    .app-input--checked {
        &::before {
            background-color: var(--color-background-input-checked);
            background-image: var(--color-background-image-input-checked);
            background-repeat: no-repeat;
            background-position: 50% 0;
        }
    }
</style>
