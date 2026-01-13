import instance from '@js/services/api.js';

const urlTodos = '/todos';

const getTodos = async () => {
    return await instance.get(urlTodos);
}

const createTodo = async () => {
    return await instance.post(urlTodos);
}

const deleteTodo = async (id) => {
    return await instance.delete(`${urlTodos}/${id}`);
}

const updateTodo = async (id) => {
    return await instance.patch(`${urlTodos}/${id}`);
}


export default {
    getTodos,
    createTodo,
    updateTodo,
    deleteTodo
}
