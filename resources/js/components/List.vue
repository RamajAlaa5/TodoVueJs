<template>
    <div>
        <h2 class="text-center">Products List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Priority</th>
                 <th>Description</th>
                 <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="rodo in todos" :key="product.id">
                <td>{{ todo.id }}</td>
                <td>{{ todo.name }}</td>
                <td>{{ todo.priority }}</td>
                <td>{{ product.description }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: todo.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteTodo(todo.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
                name:"AllTodo",
        data() {
            return {
                todos: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/todos/')
                .then(response => {
                    this.todos = response.data;
                });
        },
        methods: {
            deleteTodo(id) {
                this.axios
                    .delete(`http://localhost:8000/api/todos/${id}/deleteTodo`)
                    .then(response => {
                        let i = this.products.map(data => data.id).indexOf(id);
                        this.todos.splice(i, 1)
                    });
            }
        }
    }
</script>
