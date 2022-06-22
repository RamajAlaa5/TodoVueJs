<template>
    <div>
        <h3 class="text-center">Create Todo</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addTodo">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="todo.name">
                    </div>

                    <div class="form-group">
                        <label>Priority</label>
                        <input type="text" class="form-control" v-model="todo.priority">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="todo.description">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"CreateTodo",
        data() {
            return {
                todo: {}
            }
        },
        methods: {
            addTodo() {
                this.axios
                    .post('http://localhost:8000/api/soreTodo', this.todo)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
