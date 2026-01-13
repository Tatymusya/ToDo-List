<template>
    <AppModal id="form-text-record" :modalTitle="`Запись #${id !== null ? id : ''}`">
        <template #content>
            <form action="/api/v1/todos" method="post" @submit.prevent="onSubmit">
                <AppInput inputName="note" :isDefault="true" id="note" placeholder="Введите текст..." v-model="title" />
            </form>
        </template>
        <template #controls>
            <AppButton :isDefaultStyle="false" :isDefaultOnlyBorderStyle="true" :hasText="true" @click="$emit('closeForm')">Отменить</AppButton>
            <AppButton
                v-if="!id"
                :hasText="true"
                type="submit"
                @click="$emit('addTodoNote')"
            >
                <span>Добавить</span>
            </AppButton>
            <AppButton
                v-if="id"
                :hasText="true"
                type="submit"
                @click="$emit('updateTodoNote')"
            >
                <span>Обновить</span>
            </AppButton>
        </template>
    </AppModal>
</template>

<script setup>
    import AppModal from '@js/components/ui/AppModal.vue';
    import AppButton from '@js/components/ui/AppButton.vue';
    import AppInput from '@js/components/ui/AppInput.vue';

    const title = defineModel();
    const props = defineProps(['id', 'errors', 'isEditTodo']);
    const emit = defineEmits(['addTodoNote', 'closeForm', 'updateTodoNote']);

    defineExpose({
        title
    });
</script>

<style scoped>
    .form-text-record__button {
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid var(--purply-blue-color);
        color: var(--purply-blue-color);
        background-color: transparent;
        min-block-size: 2.375rem;
    }
</style>
