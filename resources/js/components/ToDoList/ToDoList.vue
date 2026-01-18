<template>
    <section class="todo-list-period">
        <h2 v-if="todos.data" class="visually-hidden">Список дел за период</h2>
        <ul v-if="todos.data" class="todo-list" role="list">
            <ToDoListItem
                v-for="todo in todos.data"
                :key="todo.id"
                :id="todo.id"
                :isCompleted="todo.completed"
                @delete-todo="deleteTodoById(todo.id)"
                @update-complete-todo="updateCompleteById(todo.id)"
                @edit-note="editNoteById(todo)"
            >
                <strong class="todo-list__id">#{{ todo.id }}</strong>
                <span>{{ todo.title }}</span>
            </ToDoListItem>
        </ul>
        <AppEmpty v-if="!todos.data" />
        <AppButton class="todo-list-period__add-button" hiddenText="Добавить запись" @click="showAddForm">
            <IconAdd />
        </AppButton>
        <AppPagination v-if="todos?.meta?.total && todos?.meta?.total > 5" :links="todos.links" :meta="todos.meta" />
        <FormTextRecord
            :id="noteId"
            v-model="titleV"
            @add-todo-note="addTodoNote"
            @update-todo-note="updateTodoNote"
            @close-form="closeForm"
        />
        <AppMessages ref="messagesResponse" />
    </section>
</template>

<script setup>
    import ToDoListItem from '@js/components/ToDoList/ToDoListItem.vue';
    import AppButton from '@js/components/ui/AppButton.vue';
    import AppPagination from '@js/components/ui/AppPagination.vue';
    import AppMessages from '@js/components/ui/AppMessages.vue';
    import IconAdd from '@/images/icons/icon-add.svg?component';
    import AppEmpty from '@js/components/layouts/AppEmptyContainer.vue';
    import FormTextRecord from '@js/components/FormTextRecord.vue';
    import { router } from "@inertiajs/vue3";
    import { ref } from 'vue';
    import todosAPI from '@js/services/todos';

    const props = defineProps(['todos', 'isSearchResult']);
    const messagesResponse = ref(null);
    const noteId = ref(null);
    let titleV = ref('');

    const resetInputValue = (inpValue) => {
        inpValue = '';
    }

    const checkNoteId = (id) => {
        noteId.value = typeof id !== 'number' ? null : id;
    }

    const showMessage = async (message, hasError = false) => {
        return await messagesResponse.value?.addMessages({ text: message, type: 'success' }, hasError);
    }

    const reloadPageWhenSuccess = async () => {
        router.reload({ only: ['todos'] },
            {
                onFinish: () => messagesResponse.value?.removeMessage(),
            }
        );
    }

    const deleteTodoById = async (id) => {
        try {
            const response = await todosAPI.deleteTodo(id);

            showMessage(response?.data?.message);

            reloadPageWhenSuccess();
        } catch(e) {
            showMessage(e?.message, true);
        }

    }

    const updateCompleteById = async (id) => {
        try {
            const response = await todosAPI.updateTodo(id);

            showMessage(response?.data?.message);

            reloadPageWhenSuccess();
        } catch(e) {
            showMessage(e?.message, true);
        }
    }

    const closeForm = () => {
        const formTextRecord = document.getElementById('form-text-record');
        formTextRecord.close();
    }

    const showAddForm = (id) => {
        const formTextRecord = document.getElementById('form-text-record');
        checkNoteId(id);
        if (!noteId.value) {
            resetInputValue(titleV.value);
        }

        formTextRecord.showModal();
    }

    const editNoteById = (todo) => {
        noteId.value = todo.id;
        titleV.value = todo.title;
        showAddForm(todo.id);
    }

    const addTodoNote = async () => {
        try {
            const data = new FormData();
            data.append('title', titleV.value);
            const response = await todosAPI.createTodo(data);
            closeForm();
            showMessage(response?.data?.message);

            reloadPageWhenSuccess();
        } catch(e) {
            showMessage(e?.message, true);
        }

    }

    const updateTodoNote = async () => {
        try {
            const data = new FormData();
            data.append('id', noteId.value);
            data.append('title', titleV.value);
            const response = await todosAPI.updateTodo(noteId.value, data);
            closeForm();
            showMessage(response?.data?.message);

            reloadPageWhenSuccess();
        } catch(e) {
            showMessage(e?.message, true);
        }
    }
</script>

<style scoped>
    .todo-list-period {
        position: relative;
        padding-block-end: 6.125rem;

        @container (inline-size > 20rem) {
            min-block-size: calc(100dvh - 6.4375rem);
        }

        @container (inline-size > 80rem) {
            min-block-size: calc(100dvh - 8.4375rem);
        }

        .todo-list-period__add-button {
            position: absolute;
            inset-block-end: 3rem;
            inset-inline-end: 0.5rem;
            inline-size: 3.125rem;
            block-size: 3.125rem;
            border-radius: 50%;
        }
    }
    .todo-list {
        margin-block-start: 1rem;

        .todo-list__id {
            font-size: 1rem;
        }
    }
</style>
