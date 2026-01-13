import instance from '@js/services/api.js';

const urlTodos = '/todos';

const getTodos = async () => {
    return await instance.get(urlTodos);
}

const createTodo = async (todo) => {
    return await instance.post(urlTodos, todo);
}

const deleteTodo = async (id) => {
    return await instance.delete(`${urlTodos}/${id}`);
}

const updateTodo = async (id, todo = undefined) => {
    return await instance.patch(`${urlTodos}/${id}`, todo);
}


export default {
    getTodos,
    createTodo,
    updateTodo,
    deleteTodo
}
