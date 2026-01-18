<template>
    <teleport to="body">
        <div
            class="app-messages"
            :class="{
                'app-messages--default': !errVal,
                'app-messages--error': errVal,
            }"
        >
            <div
                v-for="msg in messages"
                :key="msg.id"
                class="app-messages__content"
                :class="{
                    'message': msg.type,
                }"
            >
                <span>{{ msg.text }}</span>
            </div>
        </div>
    </teleport>
</template>

<script setup>
    import { uuid } from 'vue-uuid';
    import { ref } from 'vue';

    const errVal = ref(false);
    const messages = ref([]);
    const ids = ref(uuid.v1());

    const addMessages = async (message, err = false) => {
        messages.value.push({
            ...message,
            id: ids.value
        });

        errVal.value = err;

        setTimeout(() => {
            removeMessage(ids.value);
            errVal.value = false;
        }, 3000);
    }

    const removeMessage = (id) => {
        if (id) {
            let filteredMessages = messages.value.filter(msg => msg.id !== id);
            messages.value = filteredMessages;
            return;
        }

        messages.value = [];
    }

    defineExpose({
        addMessages,
        removeMessage,
        messages,
        errVal
    });

</script>

<style scoped>
    .app-messages {
        display: flex;
        inline-size: 20cqw;
        min-block-size: 1rem;
        padding-block: 0.5rem;
        padding-inline: 0.5rem;
        background-color: var(--color-background);
        border: 1px solid var(--islamic-green-color);
        border-radius: var(--base-border-radius);
        justify-content: center;
        align-items: center;
        font-size: 0.8rem;
        color: var(--islamic-green-color);
        position: fixed;
        inset-block-start: 0;
        inset-inline-start: 50%;
        transform: translateX(-50%);
        z-index: 12;
        transition-property: inset-block-start;
        transition-duration: 0.4s;
        transition-timing-function: var(--base-transition-timing-function);
        opacity: 1;

        .app-messages__content {
            text-align: center;
        }

        &.app-messages--default {
            border: 1px solid var(--islamic-green-color);
            color: var(--islamic-green-color);
        }

        &.app-messages--error {
            border: 1px solid var(--guardsman-red-color);
            color: var(--rosso-corsa-color);
        }

        @starting-style {
            inset-block-start: -4rem;
            opacity: 0;
        }

        & .app-messages__close {
            position: absolute;
            inset-block-start: 0;
            inset-inline-end: 0;
            block-size: 1.75rem;
            inline-size: 1.75rem;
            border-radius: var(--base-border-radius);
            z-index: 3;
            & svg {
                block-size: 1.75rem;
            }
        }
    }

    .app-messages:empty {
        transition: opacity .3s cubic-bezier(.4,0,.2,1),
        inset-block-start .3s cubic-bezier(.4,0,.2,1),
        display .3s cubic-bezier(.4,0,.2,1) allow-discrete;
        inset-block-start: -4rem;
        display: none;
    }
</style>
